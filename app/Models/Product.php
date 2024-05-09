<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use hasFactory;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }

    protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'type',
        'weight',
        'description',
        'unit_price',
        'category_id',
        'stock'
    ];
    
    protected $casts = [    
        'weight' => 'integer',
        'unit_price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'stock' => 'integer',
    ];

    

}
