<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user','group_id','user_id');
    }
    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'group_cursos','group_id','curso_id');
    }
    public function origemClientes()
    {
        return $this->belongsToMany(Origem_cliente::class, 'origin_groups', 'groups_id', 'origem_clientes_id');
    }
}
