<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;
    protected $table='religions';
    protected $primaryKey='religion_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['religion_id','name'];
    public $timestamps = false;
}