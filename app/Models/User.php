<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    use hasFactory;
    protected $table = 'Users';
    protected $fillable = [
        'email',
        'password',
        'name',
        'lastname',
        'created_at',
        'audated_at',
        'admin'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'audated_at' => 'datetime',
        'admin' => 'boolean'
    ];
}