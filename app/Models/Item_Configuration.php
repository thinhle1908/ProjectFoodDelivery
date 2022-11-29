<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Configuration extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "item_configuration";
    protected $fillable = ['item_id','variation_option_id'];

}
