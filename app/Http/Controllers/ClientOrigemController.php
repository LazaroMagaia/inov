<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Origem_cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Perguntas;
use App\Models\Group;
use App\Models\Origin_groups;
use Illuminate\Support\Str;

class ClientOrigemController extends Controller
{
    public function index()
    { 
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['origens'] = Origem_cliente::all();
        $data['page_name'] = 'Origem dos Clientes';
        $data["user"] = Auth::user();
        $data['origin_groups'] = Origin_groups::all();
        $data['origin_group_ids'] = $data['origin_groups']->pluck('groups_id')->toArray();

        $allGroupsData = Group::all();
        // Itere sobre todos os grupos para adicionar `id_origin` se houver correspondência
        foreach ($allGroupsData as $group) {
            // Tente encontrar o `origin_group` correspondente ao `group`
            $originGroup = $data['origin_groups']->firstWhere('groups_id', $group->id);
            
            // Se `originGroup` foi encontrado, adicione `id_origin`, caso contrário, defina como `null`
            $group->id_origin = $originGroup ? $originGroup->origem_clientes_id : null;
        }
        $data['grupos'] = $allGroupsData;
        return view('admin.pages.origem.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grupos' => 'array|required'
        ], [
            'name.required' => 'O campo nome da origem é obrigatório',
            'grupos.required' => 'Selecione pelo menos um grupo'
        ]);
    
        // Crie os campos "token" e "slug" usando Str
        $data = $request->all();
        $data['token'] = Str::uuid();
        $data['slug'] = Str::slug($data['name']);
        
        $origem = Origem_cliente::create($data);
    
        if($origem)
        {
            $origem->origemClientes()->attach($request->grupos);
            return redirect()->route('admin.origem.index')
                ->with('success', 'Origem do cliente cadastrada com sucesso');
        }
        else
        {
            return redirect()->route('admin.origem.index')
                ->with('error', 'Erro ao cadastrar a origem do cliente');
        }
    }
    public function update(Request $request, $id)
    {
        // Validação dos dados de entrada
        $request->validate([
            'name' => 'required',
            'grupos' => 'array|required' // Validação para garantir que um array de grupos seja enviado
        ], [
            'name.required' => 'O campo nome da origem é obrigatório',
            'grupos.required' => 'Selecione pelo menos um grupo' // Mensagem de erro se não houver grupos
        ]);
        
        // Encontrar a origem do cliente
        $origem = Origem_cliente::find($id);
        if (!$origem) {
            return redirect()->route('admin.origem.index')->with('error', 'Origem do cliente não encontrada');
        }
    
        // Atualizar o nome da origem
        $origem->name = $request->name;
    
        // Salvar as alterações no nome
        if ($origem->save()) {
            // Atualizar a relação com grupos
            $origem->origemClientes()->sync($request->grupos); // Sync para atualizar as relações
    
            return redirect()->route('admin.origem.index')
                ->with('success', 'Origem do cliente atualizada com sucesso');
        } else {
            return redirect()->route('admin.origem.index')->with('error', 'Erro ao atualizar a origem do cliente');
        }
    }
    
    public function delete($id)
    {
        // Encontrar a origem do cliente
        $origem = Origem_cliente::find($id);
        
        // Verificar se a origem existe
        if (!$origem) {
            return redirect()->route('admin.origem.index')->with('error', 'Origem do cliente não encontrada');
        }

        // Verificar se há usuários associados a essa origem
        $user = User::where('origin', $id)->first();
        if ($user) {
            return redirect()->back()
                ->with('error', 'Existem clientes relacionados a essa origem, remova os clientes primeiro');
        }

        // Remover as relações de grupos associadas
        $origem->origemClientes()->detach(); 

        // Deletar a origem do cliente
        if ($origem->delete()) {
            return redirect()->route('admin.origem.index')
                ->with('success', 'Origem do cliente deletada com sucesso');
        } else {
            return redirect()->route('admin.origem.index')->with('error', 'Erro ao deletar a origem do cliente');
        }
    }

}
