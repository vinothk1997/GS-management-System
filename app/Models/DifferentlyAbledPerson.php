<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifferentlyAbledPerson extends Model
{
    use HasFactory;
    protected $fillable=['member_id','family_id','type','date','reason','monthly_assist','amount'];
    public $timestamps=false;
}