<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "item";
    protected $fillable = ['sku','image','price','sale_price','quantity','sold','created_by','updated_by','product_id','discount_id'];
}
