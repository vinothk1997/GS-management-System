<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ethnic extends Model
{
    use HasFactory;
    protected $primaryKey='ethnic_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['ethnic_id','name'];
    public $timestamps = false;

}