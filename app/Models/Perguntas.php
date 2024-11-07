<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use App\Models\User;
use App\Models\Respostas;
class Perguntas extends Model
{
    use HasFactory;
    protected $fillable = ['videos_id', 'users_id', 'pergunta','respondida'];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respostas()
    {
        return $this->hasMany(Respostas::class);
    }
}
