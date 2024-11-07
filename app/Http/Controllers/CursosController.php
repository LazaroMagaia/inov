<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Videos;
use App\Models\Perguntas;
use App\Models\Video_User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Group_curso;
use App\Models\User;
class CursosController extends Controller
{
    public function index()
    {
        $data["user"] = Auth::user();
        $data['grupos'] = Group::orderBy('id', 'desc')->get();
        $data["page_name"] = "Cursos";
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['cursos'] = Cursos::with('groups')->get();
        return view('admin.pages.cursos.index',$data);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'grupos' => 'nullable|array',
            'grupos.*' => 'exists:groups,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para imagem
        ]);
        if($request->grupos == null)
        {
            return redirect()->route('admin.cursos.index')->with('error','escolha pelo menos um grupo');
        }
        // Criação do curso
        $cursos = new Cursos();

        // Se houver uma imagem, faça o upload e obtenha o caminho
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $cursosNew = new Cursos();
        $cursos = $cursosNew->createCourse($data);
        if($cursos)
        {
            foreach ($data['grupos'] as $group) {
                $group_curso = new Group_curso();
                $group_curso->create(['curso_id' => $cursos->id, 'group_id' => $group]);
            }
            return redirect()->route('admin.cursos.index')->with('success','curso cadastrado com sucesso');
        }else
        {
            return redirect()->route('admin.cursos.index')->with('error','Erro ao cadastrar curso');
        }
    }
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'grupos' => 'nullable|array',
            'grupos.*' => 'exists:groups,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para imagem
        ]);
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['image'] = $request->input('image');
        // Encontrar o curso a ser atualizado
        $curso = Cursos::findOrFail($id);

        // Verificar se há uma nova imagem e processar
        if ($request->hasFile('image')) {
            // Remover a imagem antiga se existir
            if ($curso->image) {
                Storage::disk('public')->delete($curso->image);
            }

            // Fazer o upload da nova imagem
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePagruposth; // Adicionar o caminho da nova imagem aos dados
        } else {
            // Se não há nova imagem, manter a imagem atual
            unset($data['image']); // Remove o campo de imagem dos dados se não houver nova imagem
        }
        $updateCurso = new Cursos();
        $cursos = $updateCurso->updateCourse($data, $id);
        
        if($cursos)
        { 
            if($request->grupos == null)
            {
                $curso->groups()->detach();
                return redirect()->route('admin.cursos.index')->with('success','curso atualizado com sucesso');
            }
            // Atualizar os grupos associados ao curso
            $curso::find($id)->groups();
           
            if($curso == null && $request->grupos != null)
            {
                foreach ($request->grupos as $group) {
                    $group_curso = new Group_curso();
                    $group_curso->create(['curso_id' => $cursos->id, 'group_id' => $group]);
                }
                return redirect()->route('admin.cursos.index')->with('success','curso atualizado com sucesso');
            }
            $selectedGroupIds = $request->input('grupos', []);
            $curso->groups()->sync($selectedGroupIds);
            return redirect()->route('admin.cursos.index')->with('success','curso atualizado com sucesso');
        }else
        {
            return redirect()->route('admin.cursos.index')->with('error','Erro ao atualizar curso');
        }
    }
    public function delete($id)
    {
        $id = request()->id;
        $curso = Cursos::find($id);
        $curso->delete();
        return redirect()->route('admin.cursos.index')->with('success','curso deletado com sucesso');
    }


    public function client_index()
    {
        $data["user"] = Auth::user();
        $data["page_name"] = "Cursos";
        $data['cursos'] = Cursos::all();
        $user = auth()->user()->origin;
        $Courses = User::with('groups.cursos')->find($data["user"]->id);
        $cursos = collect();
        foreach ($Courses->groups as $group) {
            $cursos = $cursos->merge($group->cursos); // Mescla todos os cursos de cada grupo
        }
        $cursosUnicos = $cursos->unique('id');
        $data['cursos'] = $cursosUnicos;
        return view('frontend.dashboard.pages.cursos.index',$data);
    }
    
    public function client_detalhe_curso($id)
    {
        // Obtém o usuário autenticado
        $user = Auth::user();
        $data["user"] = $user;
        // Obtém o curso especificado pelo ID
        $data['curso'] = Cursos::find($id);

        // Define o nome da página com base no título do curso
        $data["page_name"] = $data['curso']->title;

        // Obtém todos os vídeos do curso, ordenados pela sequência
        $videos = Videos::where('curso_id', $id)->orderBy('sequence', 'asc')->get();
        if($videos->isEmpty())
        {
            return redirect()->route('client.cursos.index')->with('error','Não há vídeos cadastrados para este curso');
        }
        // Encontra o último vídeo assistido pelo usuário no curso
        $lastWatchedVideo = $user->watchedVideos()
                                ->where('curso_id', $id)
                                ->wherePivot('watched', true)
                                ->orderBy('sequence', 'desc')
                                ->first();

        // Identifica o próximo vídeo não assistido na sequência
        $data['next_video'] = $videos->filter(function($video) use ($lastWatchedVideo) {
            return $lastWatchedVideo ? $video->sequence > $lastWatchedVideo->sequence : true;
        })->first();

        if(!$data['next_video'])
        {
            $data['next_video'] = $videos->last();
        }
        $data['watched'] = $data["user"]->watchedVideos()->where('videos_id', $data['next_video']->id)
        ->wherePivot('watched', true)->exists();

        // Mapeia os vídeos com a informação de se foram assistidos ou não pelo usuário

        foreach ($videos as $video) {
            $watchedRecord = Video_User::where('videos_id', $video->id)->where('user_id', $user->id)->first();
            $video->watched = $watchedRecord ? $watchedRecord->watched : false;
            $video->progress = $watchedRecord ? $watchedRecord->progress : 0;
        }
        // Retorna a view com os dados
        $data['videos'] = $videos;
    return view('frontend.dashboard.pages.cursos.detalhes', $data);
}


    public function client_detalhe_curso_video($id,$video)
    {
        $data["user"] = Auth::user();
        $data['curso'] = Cursos::find($id);
        $data["page_name"] = $data['curso']->title;
        $data['videos'] = Videos::where('curso_id', $id)->orderBy('sequence','asc')->get();
        $data['single_video'] = Videos::find($video);
        $data['watched'] = $data["user"]->watchedVideos()->where('videos_id', $video)
        ->wherePivot('watched', true)->exists();
        
        foreach ($data['videos'] as $video) {
            $watchedRecord = Video_User::where('videos_id', $video->id)->where('user_id', $data["user"]->id)->first();
            $video->watched = $watchedRecord ? $watchedRecord->watched : false;
            $video->progress = $watchedRecord ? $watchedRecord->progress : 0;
        }
        return view('frontend.dashboard.pages.cursos.detalhes',$data);
    }
}
