<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleBrand;

class VehicleModel extends Model
{
    protected $primaryKey='model_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['brand_id','name','model_id','vehicle_type_id'];
    public $timestamps = false;

    public function VehicleType(){
        return $this->belongsTo(VehicleType::class,'vehicle_type_id','vehicle_type_id');
    }

    public function VehicleBrand(){
        return $this->belongsTo(VehicleBrand::class,'brand_id','brand_id');
    }
}