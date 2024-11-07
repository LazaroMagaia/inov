<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origem_cliente extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','token','slug'];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function cursos()
    {
        return $this->belongsToMany(Cursos::class);
    }
    public function origemClientes()
    {
        return $this->belongsToMany(Group::class,'origin_groups','origem_clientes_id','groups_id');
    }
}
