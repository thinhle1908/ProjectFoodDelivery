<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shopping_cart';
    protected $fillable = ['user_id'];

    public function cartItem()
    {
        return $this->hasMany(Shopping_CartItem::class,'cart_id');
    }
}
