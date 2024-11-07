<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Perguntas;
class GruposController extends Controller
{
    public function index()
    {
        $data["page_name"] = "Grupos";
        $data["user"] = Auth::user();
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        $data['grupos'] = Group::orderBy('id', 'desc')->get();
        return view('admin.pages.groups.index',$data);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        $groupCreate = new Group();
        $group = $groupCreate->create($data);
        if($group)
        {
            return redirect()->route('admin.groups.index')->with('success','grupo cadastrado com sucesso');
        }else
        {
            return redirect()->route('admin.groups.index')->with('error','Erro ao cadastrar grupo');
        }
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        $group = Group::find($id);
        $group->name = $data['name'];
        $group->save();
        if($group)
        {
            return redirect()->route('admin.groups.index')->with('success','grupo atualizado com sucesso');
        }else
        {
            return redirect()->route('admin.groups.index')->with('error','Erro ao atualizar grupo');
        }
    }
    public function delete($id)
    {
        $group = Group::find($id);
        $group->delete();
        if($group)
        {
            return redirect()->route('admin.groups.index')->with('success','grupo deletado com sucesso');
        }else
        {
            return redirect()->route('admin.groups.index')->with('error','Erro ao deletar grupo');
        }
    }
}
