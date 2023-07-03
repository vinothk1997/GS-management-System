<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleModel;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable=['model_id','member_id','family_id'];
    public $timestamps=false;

    public function VehicleModel(){
        return $this->hasOne(VehicleModel::class,'model_id');
    }
}
