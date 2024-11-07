<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_curso extends Model
{
    use HasFactory;
    protected $fillable = ['curso_id', 'group_id'];

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    
}
