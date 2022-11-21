<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_role';
    protected $primary = ['user_id','role_id'];
    protected $fillable = ['user_id','role_id'];
}
