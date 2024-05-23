<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens; 


class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email',
        'password',
        'name',
        'lastname',
        'admin'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'admin' => 'boolean'
    ];
}

