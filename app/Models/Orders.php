<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Orders extends Model{
    use hasFactory;
    protected $table = 'Orders';
    protected $fillable = [
        'user_id',
        'address_id',
        'total_price',
        'created_date',
        'order_status',
        'delivery_track'
    ];
    protected $casts = [
        'user_id' => 'integer',
        'address_id' => 'integer',
        'total_price' => 'decimal:2',
        'created_date' => 'datetime'
    ];
}