<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PerfilController extends Controller
{
    public function index()
    {
        
        $data["user"] = Auth::user();
        $data["page_name"] = "Perfil";
        return view('frontend.dashboard.pages.settings.perfil', $data);
    }
    public function update_perfil()
    {
        $data = request()->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone1' => 'required|string|max:255',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->update_user($data);
        return redirect()->route('client.perfil')->with('success', 'Perfil atualizado com sucesso');
    }
    public function change_password_store(Request $request, $id)
    {
        $data = request()->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
     
        $user = User::findOrFail($id);
        $user->password = bcrypt($data['password']);
        $password_changed = $user->save();
        if (!$password_changed) {
            return redirect()->route('client.perfil')->with('error', 'Erro ao alterar senha');
        } else {
            //return redirect()->route('client.perfil')->with('success', 'Senha alterada com sucesso');
            auth()->logout();
            return redirect("/");
        }
    }
}
