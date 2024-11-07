<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cursos;
use App\Models\User;
class Videos extends Model
{
    use HasFactory; 
    protected $fillable = ['curso_id', 'link', 'thumbnail_url', 'sequence','data_adicao','title','description'
        ,'id_video'];
    
    public function viewers()
    {
        return $this->belongsToMany(User::class, 'video_user')
            ->withPivot('watched')
            ->withPivot('progress')
            ->withTimestamps();
    }

    
    public function createVideo($data)
    {
        $this->curso_id = $data['curso_id'];
        $this->link = $data["link"];
        $this->title = $data['title'];
        $video_thumbnail = $this->getYouTubeVideoId($data['link']);
        $this->id_video = $video_thumbnail;
        $this->description  = $this->getYouTubeVideoDescription($video_thumbnail);
        $this->thumbnail_url = 'https://img.youtube.com/vi/'.$video_thumbnail.'/maxresdefault.jpg';
        $this->sequence = $data['sequence'];
        $this->data_adicao = date('Y-m-d');
        return $this->save();
    }

    function getYouTubeVideoId($url) {
        // Remove parâmetros adicionais após o ID do vídeo
        $url = parse_url($url, PHP_URL_PATH);
        
        // ID do vídeo está após "/"
        $parts = explode('/', trim($url, '/'));
        
        // Retorna o primeiro segmento após "/"
        return isset($parts[0]) ? $parts[0] : null;
    }
    private function getYouTubeVideoDescription($videoId)
    {
        $apiKey = env('YOUTUBE_API_KEY');
        $url = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoId . '&key=' . $apiKey . '&part=snippet';

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Retorna a descrição se disponível
        return $data['items'][0]['snippet']['description'] ?? 'Descrição não encontrada';
    }


     function updateVideo($data)
    {
        $this->curso_id = $data['curso_id'];
        $this->link = $data["link"];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $video_thumbnail = $this->getYouTubeVideoId($data['link']);
        $this->id_video = $video_thumbnail;
        $this->thumbnail_url = 'https://img.youtube.com/vi/'.$video_thumbnail.'/maxresdefault.jpg';
        $this->sequence = $data['sequence'];
        return $this->save();
    }
    public function getYouTubeVideoIdLink($link)
    {
        // Expressão regular para encontrar o ID do vídeo
        $pattern = '/https:\/\/youtu\.be\/([A-Za-z0-9_-]+)/';

        if (preg_match($pattern, $link, $matches)) {
            // $matches[1] contém o ID do vídeo
            return $matches[1];
        }

        return "ID do vídeo não encontrado";
    }

    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }
    public function videoUser()
    {
        return $this->hasMany(Video_users::class);
    }
}
