<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Categories extends Model{
    use hasFactory;
    protected $table = 'Categories';
    protected $fillable = [
        'name',
    ];

}