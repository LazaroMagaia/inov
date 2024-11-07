<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory; 
    protected $fillable = ['title', 'description','client_type', 'image'];

    public function createCourse($data)
    {
        return $this->create($data);
    }
    public function updateCourse($data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

    public function videos()
    {
        return $this->hasMany(Videos::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_cursos','curso_id','group_id');
    }
}
