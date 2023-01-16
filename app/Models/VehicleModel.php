<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $primaryKey='brand_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['brand_id','name'];
    public $timestamps = false;
}