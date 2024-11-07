<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perguntas;
use Illuminate\Support\Facades\Auth;
class ComentariosController extends Controller
{
    public function index($video_id)
    {
        $data["user"] = Auth::user();
        $data['perguntas'] = Perguntas::where('videos_id', $video_id)->get();
        $data['page_name'] = 'Comentários';
        return view('frontend.dashboard.pages.comentarios.index', $data);
    }
    public function resposta($id)
    {
        $data["user"] = Auth::user();
        $data['pergunta'] = Perguntas::findOrFail($id);
        $data['respostas'] = $data['pergunta']->respostas;
        $data['page_name'] = 'Responder Comentário';
        if($data['user']->role_id == 1)
        {
            return view('admin.pages.perguntas.single-pergunta', $data);
            //admin.comentarios.resposta
        }
        return view('frontend.dashboard.pages.comentarios.respostas', $data);
    }
}
