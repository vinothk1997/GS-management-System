<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;
    protected $primaryKey='district_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['district_id','name'];
    public $timestamps = false;
}