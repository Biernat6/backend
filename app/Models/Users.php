<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Users extends Model{
    use hasFactory;
    protected $table = 'Users';
    protected $fillable = [
        'email',
        'password',
        'name',
        'lastname',
        'created_date',
        'modified_date',
        'admin'
    ];
    protected $casts = [
        'created_date' => 'datetime',
        'modified_date' => 'datetime',
        'admin' => 'boolean'
    ];
}