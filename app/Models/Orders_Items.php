<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Orders_Items extends Model{
    use hasFactory;
    protected $table = 'Orders_Items';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
    ];
    protected $casts = [
        'order_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
    ];
}