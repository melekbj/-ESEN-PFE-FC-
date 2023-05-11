<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public $timestemps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'idVille',
        'idSpec',
        'role',
        'approved',
        'num',
        'avatar',
    ];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'idSpec', 'idSpec');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'idVille', 'idVille');
    }

    public function rdvs()
    {
        return $this->belongsTo(Rdv::class, 'idPatient', 'id');
    }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
