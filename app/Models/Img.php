<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Img extends Model{
    use hasFactory;
    protected $table = 'Img';
    protected $primaryKey = 'img_id';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'img_url'
    ];
    protected $casts = [
        'product_id' => 'integer',
    ];
}