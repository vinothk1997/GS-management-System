<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table='users';
    protected $keyType="string";
    protected $primaryKey="user_id";
    protected $fillable=['user_id','name','password','user_type	','attempt','status','verification_code'];
    public $timestamps=false;
}