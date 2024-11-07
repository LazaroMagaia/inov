<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Perguntas;
use Illuminate\Support\Facades\Auth;
class RolesAndPermissionsController extends Controller
{
    public function roles_index()
    {
        $data["user"] = Auth::user();
        $data["page_name"] = "Regras";
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['roles'] = Role::all();
        return view('admin.pages.definicoes.roles',$data);
    }
    public function permissions_index()
    {
        $data["user"] = Auth::user();
        $data["page_name"] = "Permissoes";
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['permissions'] = Permission::all();
        $data['roles'] = Role::all();
        return view('admin.pages.definicoes.permissions',$data);
    }

    /* STORE */
    /**
     * Store a newly role created resource in storage.
     */
    public function store_role(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['guard_name'] = 'web';
        $role = Role::create($data);
        if($role)
        {
            return redirect()->back()->with('success', 'Regra criada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao criar regra');
        }
    }
    /**
     * Store a newly permission created resource in storage.
     */
    public function store_permission(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['guard_name'] = 'web';
        $permission = Permission::create($data);
        if($permission)
        {
            return redirect()->back()->with('success', 'Permissão criada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao criar permissão');
        }
    }
    /*
    * Update a newly role created resource in storage.
    */
    public function update_roles(Request $request)
    {
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->save();
        if($role)
        {
            return redirect()->back()->with('success', 'Regra atualizada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar regra');
        }

    }
    
    /*
    * Update a newly permission created resource in storage.
    */
    public function update_permissions(Request $request)
    {
        $permission = Permission::find($request->id);
        $permission->name = $request->name;
        $permission->save();
        if($permission)
        {
            return redirect()->back()->with('success', 'Permissão atualizada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar permissão');
        }
    }

    /*
    * Delete a newly role created resource in storage.
    */
    public function delete_roles($id)
    {
        $role = Role::find($id);
        $role->delete();
        if($role)
        {
            return redirect()->back()->with('success', 'Regra deletada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao deletar regra');
        }
    }
    /*
    * Delete a newly permission created resource in storage.
    */
    public function delete_permissions($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        if($permission)
        {
            return redirect()->back()->with('success', 'Permissão deletada com sucesso');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao deletar permissão');
        }
    }

    public function assign_permissions($id)
    {
        $data["user"] = Auth::user();
        $data["page_name"] = "Regras e Permissões";
        $data['role'] = Role::find($id);
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['permissions'] = Permission::all();

        // Obter permissões já associadas à role
        $assignedPermissions = $data['role']->permissions;

        // Filtrar permissões que ainda não estão associadas
        $unassignedPermissions = $data['permissions']->diff($assignedPermissions);
        
        $data['permissions'] = $unassignedPermissions;
        $data['assignedPermissions'] = $assignedPermissions;
        return view('admin.pages.definicoes.roles_permissions',$data);
    }

    public function assignPermissions_store(Request $request)
    {
        // Valide os dados do formulário
        $request->validate([
            'role' => 'required|exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        // Encontre a role selecionada
        $role = Role::findOrFail($request->input('role'));

        // Encontre as permissões selecionadas
        $permissions = Permission::whereIn('id', $request->input('permissions'))->get();

        // Sincronize as permissões com a role
        $role->givePermissionTo($permissions);
        // Redirecione ou retorne uma resposta
        if($role)
        {
            return redirect()->back()->with('success', 'Permissões atualizadas com sucesso!');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao atualizar permissões');
        }
    }

    public function remove_permissions_role(Request $request, $roleId)
    {
        // Validação dos dados
        $request->validate([
            'role' => 'required|exists:roles,id',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        // Encontrar a role
        $role = Role::findOrFail($request->input('role'));

        if(isset($permissions)){
            return redirect()->back()->with('error', 'Permissões não encontradas');
        }  
        // Obter permissões selecionadas
        $permissions = Permission::whereIn('id', $request->input('permissions'))->get();

        // Sincronizar permissões com a role
        $role->revokePermissionTo($permissions);
        if($role)
        {
            return redirect()->back()->with('success', 'Permissões removida com sucesso!');
        }else
        {
            return redirect()->back()->with('error', 'Erro ao remover permissões');
        }
    }

}
