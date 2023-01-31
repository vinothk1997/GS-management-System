<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    protected $primaryKey='brand_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['brand_id','brand'];
    public $timestamps = false;
}