<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoUsers extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'video_id'];
    protected $table = 'video_users';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function video()
    {
        return $this->belongsTo(Videos::class);
    }
    
}