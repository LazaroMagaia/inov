<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'sidebar_background','sidebar_menu_background','sidebar_menu_hover','top_background','content_background',
        'content_table_background'
    ];
}
