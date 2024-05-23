<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use hasFactory;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];
    
    protected $casts = [    
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(Img::class, 'product_id');
    }

}
