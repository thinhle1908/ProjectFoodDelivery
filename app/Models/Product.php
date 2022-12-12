<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable  =['name','description','image','created_by'];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id',);
    }
}
