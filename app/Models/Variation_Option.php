<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation_Option extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'variation_option';
    protected $fillable =['value','variation_id'];
}
