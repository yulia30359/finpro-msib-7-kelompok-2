<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'idUser';

    protected $fillable = [
        'email', 'password', 'numberPhone', 'name', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}