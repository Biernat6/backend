<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Img extends Model{
    use hasFactory;
    protected $table = 'Img';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'url'
    ];
    protected $casts = [
        'product_id' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}