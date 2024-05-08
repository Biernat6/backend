<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adres extends Model{
    use hasFactory;

    protected $table = 'Adres';

    protected $fillable = [
        'user_id',
        'country',
        'city',
        'street',
        'home',
        'local',
        'zip_code',
        'created_date',
        'modified_date'
    ];
    
    protected $casts = [
        'user_id' => 'integer',
        'home' => 'integer',
        'local' => 'integer',
        'zip_code' => 'integer',
        'created_date' => 'datetime',
        'modified_date' => 'datetime',
    ];

    
}
