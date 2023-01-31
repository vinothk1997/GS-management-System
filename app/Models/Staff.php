<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $primaryKey='staff_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['staff_id','first_name','last_name','nic','dob','gender','mobile','address'];
    public $timestamps = false;
}