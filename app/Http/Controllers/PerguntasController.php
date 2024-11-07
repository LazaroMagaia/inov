<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perguntas;
use App\Models\Respostas;
use App\Notifications\RespostaRecebida;
use App\Notifications\PerguntaFeita;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PerguntasController extends Controller
{
   public function store(Request $request)
    {
        $request->validate([
            'videos_id' => 'required',
            'pergunta' => 'required|string',
        ]);
        $pergunta = Perguntas::create([
            'videos_id' => $request->videos_id,
            'users_id' => auth()->id(),
            'pergunta' => $request->pergunta,
        ]);
        if($pergunta)
        {
            $admins = User::where('role_id', 1)->get();
            Notification::send($admins, new PerguntaFeita($pergunta));
            return redirect()->back()->with('success', 'Pergunta enviada com sucesso!');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao enviar pergunta!');
        }
  
    }

    public function respond(Request $request, $id)
    {
        $request->validate([
            'resposta' => 'required|string',
        ]);

        $pergunta = Perguntas::findOrFail($id);

        $resposta = Respostas::create([
            'perguntas_id' => $id,
            'users_id' => auth()->id(),
            'resposta' => $request->input('resposta'),
        ]);
        if($resposta)
        {
            $pergunta->respondida = true;
            $pergunta->save();
            // Notificar o usuário sobre a resposta
            $user = $pergunta->users_id;
            $finnalUser = User::findOrFail($user);
            $finnalUser->notify(new RespostaRecebida($resposta));

            return redirect()->back()->with('success', 'Resposta enviada com sucesso!');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao enviar resposta!');
        }
        
    }

    public function show($id)
    {
        $data["user"] = Auth::user();
        $pergunta = Perguntas::with('respostas.user')->findOrFail($id);
        return view('perguntas.show', compact('pergunta'));
    }

    public function destroy($id)
    {
        $pergunta = Perguntas::findOrFail($id);
        $pergunta->delete();
        return redirect()->back()->with('success', 'Pergunta deletada com sucesso!');
    }

    public function AdminPerguntas()
    {
        $data["user"] = Auth::user();
        $data["page_name"] = "Duvidas";
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        //PEGUNTAS NAO RESPONDIDAS
        //$data["perguntas"] = Perguntas::where('respondida', false)->get();
        $data["perguntas"] = Perguntas::all();
        return view('admin.pages.perguntas.index',$data);
    }
  
}
