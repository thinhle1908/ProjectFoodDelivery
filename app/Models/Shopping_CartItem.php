<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_CartItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shopping_cartitem';
    protected $fillable = ['qty','cart_id','item_id'];
}
