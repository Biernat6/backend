<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Categories extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'categories'; 
    public $timestamps = false;
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}

