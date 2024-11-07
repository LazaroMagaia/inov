<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Perguntas;
use App\Models\Cursos;
use App\Models\Videos;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Origin_groups;
use Illuminate\Support\Facades\Hash;
use App\Models\Origem_cliente;
use Spatie\Permission\Models\Role;
class ClientController extends Controller
{
    public function index()
    {

        $data["page_name"] = "Administracao";
        $user = Auth::user()->id;
        $data["user"] = Auth::user();
        $Courses = User::with('groups.cursos')->find($user);
        $totalCursos = 0;

        $cursos = collect();
        foreach ($Courses->groups as $group) {
            $cursos = $cursos->merge($group->cursos); // Mescla todos os cursos de cada grupo
        }
        $cursosUnicos = $cursos->unique('id');
        $totalCursos = $cursosUnicos->count();

        $data["total_perguntas"] = Perguntas::where("users_id",$user)->count();
        $data["total_courses"] = Cursos::all()->count();

        $data["total_courses"] = $totalCursos;
        $data["total_videos"] = Videos::all()->count();

        return view('frontend.index',$data);
    }
    public function user_register($token,$slug)
    {
        $data["page_name"] = "Registro";
        $data["token"] = $token;
        $data["slug"] = $slug;
        return view('frontend.register',$data);
    }
    public function user_register_store(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'token' => 'required',
            'slug' => 'required'
        ]);
    
        // Preparação dos dados
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['origin'] = 2;
    
        // Verificando origem
        $origem = Origem_cliente::where('token', $request->token)
                                 ->where('slug', $request->slug)
                                 ->first();

        $origin_groups = Origin_groups::where('origem_clientes_id', $origem->id)->pluck('groups_id')->toArray();
        $groups = Group::whereIn('id', $origin_groups)->get()->toArray();

        if ($origem) {
            // Obtendo grupos associados à origem
            $groupsx = Origin_groups::where('origem_clientes_id', $origem->id)->get()->toArray();
        } else {
            return redirect()->back()->with('error', 'Token ou slug inválidos');
        }
    
        // Removendo token e slug dos dados do usuário
        $data['token'] = null;
        $data['slug'] = null;
        $role = Role::where('name', 'cliente')->first();
        $data['role_id'] = $role->id;
        // Criando o usuário
        $user = User::create($data);
    
        if ($user) {
            // Atribuindo o papel ao usuário
            $user->assignRole('cliente');
    
            $userGroups = [];
            foreach ($groups as $group) {
                $userGroups[$group['id']] = ['user_id' => $user->id];
            }
            $user->groups()->sync($userGroups);
            return redirect()->route('login')
                             ->with('success', 'Usuário cadastrado com sucesso');
        }
    
        // Se a criação do usuário falhar, redirecionar com um erro
        return redirect()->back()->with('error', 'Erro ao cadastrar o usuário');
    }    
    
}
