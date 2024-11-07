<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Origem_cliente;
class Origin_groups extends Model
{
    use HasFactory;
    protected $filable = ['groups_id', 'origem_clientes_id'];

    public function OriginGroups()
    {
        return $this->belongsToMany(Group::class, 'origin_groups', 'origem_clientes_id', 'groups_id');
    }
}
