<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Videos;
use App\Models\Cursos;
use App\Models\Perguntas;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VideoUsers;
use App\Models\video_curso_user;
use App\Models\videos_watched;

class VideosController extends Controller
{
    public function index()
    {
        $data["user"] = Auth::user();
        $data["page_name"] = "Videos";
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['videos'] = Videos::with('curso')->orderBy('id', 'desc')->get(); 
        $data['cursos'] = Cursos::orderBy('id', 'desc')->get();
        $data['alunos'] = User::where('role_id',2)->orderBy('id', 'desc')->get();
        $data['alunos_linkados'] = video_curso_user::orderBy('id', 'desc')->get();
        if (count( $data['cursos']) < 1) {
            return redirect()->route('admin.cursos.index')
            ->with('error', 'Precisa cadastrar um curso antes de cadastrar um vídeo');
        }
        return view('admin.pages.videos.index',$data);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'link' => 'required',
            'sequence' => 'required'
        ]);
        $videoCreate = new Videos();
        $video = $videoCreate->createVideo($data);
        if($video)
        {
            return redirect()->route('admin.videos.index')->with('success','video cadastrado com sucesso');
        }else
        {
            return redirect()->route('admin.videos.index')->with('error','Erro ao cadastrar video');
        }
    }
    public function update(Request $request,$id)
    {
        $data = $request->all();
        $request->validate([
            'title' =>'required',
            'link' => 'required',
            'sequence' => 'required',
            'data_adicao'=>'required'
        ]);
        $video = Videos::find($id);
        $video->updateVideo($data);
        if($video)
        {
            return redirect()->route('admin.videos.index')->with('success','video atualizado com sucesso');
        }else
        {
            return redirect()->route('admin.videos.index')->with('error','Erro ao atualizar video');
        }
    }
    public function delete($id)
    {
        $video = Videos::find($id);
        $video->delete();
        if($video)
        {
            return redirect()->route('admin.videos.index')->with('success','video deletado com sucesso');
        }else
        {
            return redirect()->route('admin.videos.index')->with('error','Erro ao deletar video');
        }
    }
    
    public function video_watched($id)
    {
        // Valida se o vídeo existe
        $video = Videos::find($id);
        $user = Auth::user();
    
        if (!$video || !$user) {
            return redirect()->back()->with('error', 'Vídeo ou usuário não encontrado.');
        }
    
        // Verifica se o vídeo já foi assistido pelo usuário
        $existingWatch = $user->watchedVideos()->wherePivot('videos_id', $video->id)->first();
    
        if ($existingWatch) {
            // Atualiza o status de assistido se já existir
            $user->watchedVideos()->updateExistingPivot($video->id, ['watched' => true]);
        } else {
            // Cria um novo registro se não existir
            $user->watchedVideos()->attach($video->id, ['watched' => true]);
        }
    
        return redirect()->back()->with('success', 'Vídeo marcado como assistido.');
    }

     
    public function video_watched_api($id, $user_id)
    {
        // Validação dos parâmetros
        $video = Videos::find($id);
        $user = User::find($user_id);
    
        if (!$video || !$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Vídeo ou usuário não encontrado'
            ], 404);
        }
    
        // Verifica se o vídeo já foi assistido pelo usuário
        $existingWatch = $user->watchedVideos()->wherePivot('videos_id', $video->id)->first();
    
        if ($existingWatch) {
            // Atualiza o status de assistido se já existir
            $user->watchedVideos()->updateExistingPivot($video->id, ['watched' => true]);
        } else {
            // Cria um novo registro se não existir
            $user->watchedVideos()->attach($video->id, ['watched' => true]);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Operação realizada com sucesso'
        ]);
    }

    public function video_progress_api($id, $user_id, $progress)
    {
        // Validação dos parâmetros
        $video = Videos::find($id);
        $user = User::find($user_id);
    
        if (!$video || !$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Vídeo ou usuário não encontrado'
            ], 404);
        }
    
        // Verifica se o progresso do vídeo para o usuário já existe
        $existingProgress = videos_watched::where('videos_id', $video->id)->first();
    
        if ($existingProgress) {
            // Se o progresso enviado for menor ou igual ao progresso existente, não atualize
            if ($progress <= $existingProgress->progress) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'O progresso enviado é menor ou igual ao progresso já registrado.'
                ]);
            }else
            {
                // Atualiza o progresso se o novo valor for maior
                $user->watchedVideos()->updateExistingPivot($video->id, ['progress' => $progress]);
            }
        } else {
            // Cria um novo registro se não existir
            $user->watchedVideos()->attach($video->id, ['progress' => $progress]);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Operação realizada com sucesso'
        ]);
    }

    public function linkarAula($cursoId, $videoId)
    {
            $data["page_name"] = "Vincular Aula ao aluno";
            $data["user"] = Auth::user();
            // Buscar IDs dos usuários já vinculados a este curso e vídeo
            $usuariosVinculadosIds = video_curso_user::where('curso_id', $cursoId)
            ->where('video_id', $videoId)
            ->pluck('user_id')
            ->toArray();
            
            // Buscar os usuários já vinculados
            $usuariosVinculados = User::whereIn('id', $usuariosVinculadosIds)
            ->where('role_id', 2)->get();
            
            // Buscar os usuários que ainda NÃO estão vinculados
            $usuariosNaoVinculados = User::whereNotIn('id', $usuariosVinculadosIds)
            ->where('role_id', 2)->get();
            $data['curso'] = Cursos::find($cursoId);
            $data['video'] = Videos::find($videoId);
            $data['usuariosNaoVinculados'] = $usuariosNaoVinculados;
            $data['usuariosVinculados'] = $usuariosVinculados;
            $data['cursos'] = Cursos::orderBy('id', 'desc')->get();
            return view('admin.pages.videos.video_linkado_curso',$data);
    }

    public function linkarSemCursoAula($videoId)
    {
            $data["page_name"] = "Vincular Aula ao aluno";
            $data["user"] = Auth::user();
            // Buscar IDs dos usuários já vinculados a este curso e vídeo
            $usuariosVinculadosIds = VideoUsers::where('video_id', $videoId)
            ->pluck('user_id')
            ->toArray();
            
            // Buscar os usuários já vinculados
            $usuariosVinculados = User::whereIn('id', $usuariosVinculadosIds)
            ->where('role_id', 2)->get();
            
            // Buscar os usuários que ainda NÃO estão vinculados
            $usuariosNaoVinculados = User::whereNotIn('id', $usuariosVinculadosIds)
            ->where('role_id', 2)->get();
            $data['video'] = Videos::find($videoId);
            $data['usuariosNaoVinculados'] = $usuariosNaoVinculados;
            $data['usuariosVinculados'] = $usuariosVinculados;
            return view('admin.pages.videos.video_linkado_curso',$data);
    }

    public function linkarAulaStore(Request $request)
    {
 
        $validated = $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ]);
        $videoId = $request->video_id;
        $cursoId = $request->curso_id;
        $userIds = $validated['user_ids'];
        
        if($cursoId == null)
        {
            // Adiciona novas vinculações
            foreach ($userIds as $userId) {
                VideoUsers::create([
                    'user_id' => $userId,
                    'video_id' => $videoId
                ]);
            }
            return redirect()->back()->with('success', 'Vinculações atualizadas com sucesso!');
        }
        // Adiciona novas vinculações
        foreach ($userIds as $userId) {
            video_curso_user::create([
                'user_id' => $userId,
                'curso_id' => $cursoId,
                'video_id' => $videoId
            ]);
        }

        return redirect()->back()->with('success', 'Vinculações atualizadas com sucesso!');
    }
    public function deslinkarAula(Request $request)
    {
            $validated = $request->validate([
                'user_ids' => 'required|array',
                'user_ids.*' => 'exists:users,id',
                'video_id' => 'required|exists:videos,id',
            ]);
        
            $videoId = $validated['video_id'];
            $cursoId = $request->curso_id;
            $userIds = $validated['user_ids'];
            if(!$cursoId)
            {
                // Remover as associações existentes
                VideoUsers::whereIn('user_id', $userIds)
                    ->where('video_id', $videoId)
                    ->delete();
            }
            // Remover as associações existentes
            video_curso_user::whereIn('user_id', $userIds)
                ->where('curso_id', $cursoId)
                ->where('video_id', $videoId)
                ->delete();
        
            // Opcional: Adicionar lógica para adicionar novas associações, se necessário
        
            return redirect()->back()
                             ->with('success', 'Aluno desvinculados com sucesso.');    
    }

    public function frontendVideo()
    {
        $data["page_name"] = "Videos";
        $data["user"] = Auth::user();
        $videos_users_ids = VideoUsers::where('user_id',$data['user']->id)->pluck('video_id')->toArray();
        $data['video_cursos'] =  video_curso_user::where('user_id',$data['user']->id)->pluck('video_id')->toArray();
        $videos = [];
        // Mesclando os dois arrays
        $combined_videos = array_merge($videos_users_ids, $data['video_cursos']);
        // Removendo duplicatas, se necessário
        $combined_videos = array_unique($combined_videos);
        $videos = [];
        $watchedVideos = $data["user"]->watchedVideos()->wherePivot('watched', true)->pluck('videos_id')->toArray();
        foreach ($combined_videos as $video_id) {
            $video = Videos::find($video_id);
            if ($video) {
                // Verifica se o vídeo está na lista de vídeos assistidos
                $video->watched = in_array($video_id, $watchedVideos);
                if($video->watched)
                {
                    $video->progress = $data["user"]->watchedVideos()->where('videos_id', $video_id)->first()->pivot->progress;
                }
                $videos[] = $video;
            }
        }
        $data['videos'] = $videos;
        return view('frontend.dashboard.pages.videos.index',$data);
    }
    public function frontendVideSingle($id)
    {
        $data["page_name"] = "Videos";
        $data["user"] = Auth::user();
        $data['video'] = Videos::with('curso')->find($id);
        $data['watchedVideo'] = videos_watched::where('videos_id', $id)
        ->where('user_id',$data["user"]->id)->first();
        if(!$data['watchedVideo'])
        {
            $data['watchedVideo'] = new videos_watched();
            $data['watchedVideo']->videos_id = $id;
            $data['watchedVideo']->user_id = $data["user"]->id;
            $data['watchedVideo']->progress = 0;
            $data['watchedVideo']->watched = false;
            $data['watchedVideo']->save();
        }
        return view('frontend.dashboard.pages.videos.single',$data);
    }
}
