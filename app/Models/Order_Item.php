<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'order_item';
    protected $fillable  = ['item_id','quantity','total','order_id'];
}
