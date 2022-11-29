<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "item";
    protected $fillable = ['sku','image','price','sale_price','quantity','sold','created_by','updated_by','product_id','discount_id'];
    public function item_configuration()
    {
        return $this->belongsToMany(Variation_Option::class, 'item_configuration', 'item_id', 'variation_option_id');
    }
}
