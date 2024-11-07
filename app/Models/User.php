<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Videos;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name','last_name','phone1','phone2','from_status',
        'email','role_id','password','origin','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    } 

    public function watchedVideos()
    {
        return $this->belongsToMany(Videos::class, 'videos_watcheds')
            ->withPivot('watched')
            ->withTimestamps();
    }

    public function create_user($data){
        $create_user_data = $this->create($data);
        if($create_user_data)
        {
            if($data["role"] == 'admin')
            {
                $create_user_data->assignRole('admin');
            }else
            {
                $create_user_data->assignRole('cliente');

                $userGroups = [];
                foreach ($data['grupos'] as $grupoId) {
                    $userGroups[$grupoId] = ['user_id' => $create_user_data->id];
                }
                $this->groups()->sync($userGroups);
            }
            return true;
        }else
        {
            return false;
        }
    }
    public function update_user($data) {
        // Verifica se o campo 'password' está presente e não está vazio
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']); // Criptografa a senha
        } else {
            unset($data['password']); // Remove o campo 'password' se estiver vazio
        }
    
        // Atualiza os dados do usuário
        $update_user_data = $this->update($data);
    
        if ($update_user_data) {
            // Atualiza o role
            if (isset($data['role'])) {
                $this->roles()->detach(); // Remove todos os papéis atuais
    
                if ($data["role"] == 'admin') {
                    $this->assignRole('admin');
                } else {
                    $this->assignRole('cliente');
    
                    // Atualizando os grupos
                    if (isset($data['grupos'])) {
                        $userGroups = [];
                        foreach ($data['grupos'] as $grupoId) {
                            $userGroups[$grupoId] = ['user_id' => $this->id]; // Adiciona o user_id ao array
                        }
                        $this->groups()->sync($userGroups); // Sincroniza os grupos
                    } else {
                        $this->groups()->detach(); // Remove todos os grupos
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_users','user_id','group_id');
    }
    public function cursos()
    {
        return $this->hasManyThrough(Cursos::class, Group::class, 'id', 'id', 'group_id', 'cursos_id');
    }
    public function videos()
    {
        return $this->hasManyThrough(Videos::class, Cursos::class, 'id', 'id', 'cursos_id', 'video_id');
    }

}
