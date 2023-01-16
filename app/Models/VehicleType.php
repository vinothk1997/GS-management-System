<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{   protected $primaryKey='vehicle_type_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['vehicle_type_id','vehicle_type'];
    public $timestamps = false;
}