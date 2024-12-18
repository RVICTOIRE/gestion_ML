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

    /**
     * Le nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'users'; // Si nécessaire, sinon Laravel prend "users" par défaut

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'role'];

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

// Liste des rôles disponibles
const ROLE_ADMIN = 'admin';
const ROLE_REPORTER = 'reporter';
const ROLE_DELEGUE = 'delegue';

// Méthodes pour vérifier le rôle
public function isAdmin()
{
    return $this->role === self::ROLE_ADMIN;
}

public function isREPORTER()
{
    return $this->role === self::ROLE_REPORTER;
}

public function isDELEGUE()
{
    return $this->role === self::ROLE_DELEGUE;
}

}
