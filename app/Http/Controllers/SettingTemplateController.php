<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\SettingsTemplate;
class SettingTemplateController extends Controller
{
    public function index()
    {
        $data["page_name"] = "Gerir tema";
        $data["user"] = Auth::user();
        $data["perguntasNaoRespondidas"] = Perguntas::where('respondida', false)->count();
        return view('admin.pages.settings.template.index',$data);
    }
}
