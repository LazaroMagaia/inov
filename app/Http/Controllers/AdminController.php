<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use App\Models\Perguntas;
use Illuminate\Support\Facades\Mail;
use App\Models\Cursos;
use App\Models\Videos;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Origem_cliente;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        $data["page_name"] = "Administracao";
        $data["user"] = Auth::user();
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data["total_users"] = User::where("origin",1)->OrWhere("origin",2)->count();
        $data["total_courses"] = Cursos::all()->count();
        $data["total_videos"] = Videos::all()->count();
        return view('admin.index',$data);
    }
    /**
     * Show all users in the system
     */
    public function users()
    {
        $data["page_name"] = "Usuarios";
        $data["user"] = Auth::user();
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data["users"] = User::all();
        $data["roles"] = Role::all();
        $data['grupos'] = Group::orderBy('id', 'desc')->get();
        $data['origens'] = Origem_cliente::all();
        return view('admin.pages.users',$data);
    }
    /**
     * Create user in the system if the cliente is registred with Admin, so he will take his password
     * in email message
     * @param Request $request
     */
    public function store_user(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'grupos' => 'nullable|array',
            'grupos.*' => 'exists:groups,id',
        ]);
        
        if($request->role == 2 && $request->grupos == null)
        {
            return redirect()->route('admin.users')->with('error','escolha pelo menos um grupo');
        }
        $data = $request->all();    
        $password = Str::random(12); 
        $data['password'] = bcrypt($password);
        $user = new User();
        if($request->role === '')
        {
            return redirect()->route('admin.users')->with('error','Selecione um cargo');
        }
        $role = Role::findById($request->role);
        $data['role'] = $role->name;
        $data['role_id'] = $role->id;
        $sendToDB = $user->create_user($data);
        if($sendToDB)
        {
            try {
                $data['password'] = $password;
                Mail::to($data['email'])->send(new \App\Mail\RegisterUserFromAdmin($data));
            } catch (\Exception $e) {
                return redirect()->route('admin.users')->with('error','Erro ao enviar email');
            }
            return redirect()->route('admin.users')->with('success','Usuario criado com sucesso');
        }else
        {
            return redirect()->route('admin.users')->with('error','Erro ao criar usuario');
        }
    }
    /**
     * Delete user from the system
     * @param int $id
     */
    public function update_user(Request $request,$id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required',
            'grupos' => 'nullable|array',
            'grupos.*' => 'exists:groups,id',
            'password' => 'nullable|min:8|confirmed',
        ],[
            'password.min' => 'A senha deve ter no minimo 8 caracteres',
            'password.confirmed' => 'As senhas não são iguais',
        ]);

        if($request->role == 2 && $request->grupos == null)
        {
            return redirect()->route('admin.users')->with('error','escolha pelo menos um grupo');
        }
        $data = $request->all(); 
      
        $role = Role::findById($request->role);
        $data['role'] = $role->name;
        $data['role_id'] = $role->id;
        $user = User::find($id);
     
        $sendToDB = $user->update_user($data);
        if($sendToDB)
        {
            return redirect()->route('admin.users')->with('success','Usuario editado com sucesso');
        }else
        {
            return redirect()->route('admin.users')->with('error','Erro ao editar usuario');
        }
    }
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        if($user){
            return redirect()->route('admin.users')->with('success','Usuario deletado com sucesso');
        }else{
            return redirect()->route('admin.users')->with('error','Erro ao deletar usuario');
        }
    }
    
}
