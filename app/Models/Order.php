<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable  =['firstname','lastname','email','mobile','address','user_id','total','quantity','status_id','discount_id'];

    public function status()
    {
        return $this->hasOne(Status::class,'id','status_id');
    }
}
