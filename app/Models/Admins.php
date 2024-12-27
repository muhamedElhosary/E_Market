<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class admins extends Model
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $primarykey='id';
    protected $fillable=
    [
        'username',
        'password',
        'admin_token'
    ];
    protected $hidden = [
        'password',
        'admin_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}