<?php
namespace App\Helpers;
use App\Models\Videos;
use App\Models\User;
use App\Models\Cursos;
use \Illuminate\Support\Str;

class GeralHelper
{
    public static function getVideo($id)
    {
        return Videos::find($id);
    }
    public static function getCurso($id)
    {
        return Cursos::find($id);
    }
    public static function getUser($id)
    {
        return User::find($id);
    }
    public static function getSlug($string,$quant)
    {
        return Str::limit($string,$quant, $end = '...');
    }

}