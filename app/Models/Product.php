<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use hasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'type',
        'weight',
        'description',
        'unit_price',
        'category_id',
        'created_date',
        'modified_date',
        'slock'
    ];
    
    protected $casts = [    
        'weight' => 'integer',
        'unit_price' => 'decimal:2',
        'created_date' => 'datetime',
        'modified_date' => 'datetime',
        'slock' => 'integer',
    ];


}
