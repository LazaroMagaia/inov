<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video_curso_user extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'curso_id', 'video_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }
    public function video()
    {
        return $this->belongsTo(Videos::class);
    }
}
