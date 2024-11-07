<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perguntas;
use App\Models\User;

class Respostas extends Model
{
    use HasFactory;
    protected $fillable = ['perguntas_id', 'users_id', 'resposta'];

    public function pergunta()
    {
        return $this->belongsTo(Perguntas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
