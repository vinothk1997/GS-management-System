<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    protected $primaryKey='occupation_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['occupation_id','name'];
    public $timestamps = false;
}