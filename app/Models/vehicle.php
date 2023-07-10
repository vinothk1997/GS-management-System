<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleModel;
use App\Models\FamilyHead;
use App\Models\FamilyMember;

class Vehicle extends Model
{
    use HasFactory;
    protected $primaryKey='[model_id,]';
    protected $fillable=['model_id','member_id','family_id'];
    public $timestamps=false;

    public function VehicleModel(){
        return $this->belongsTo(VehicleModel::class,'model_id','model_id');
    }

    public function FamilyHead(){
        return $this->belongsTo(FamilyHead::class,'family_id','family_id');
        
    }

    public function FamilyMember(){
        return $this->belongsTo(FamilyMember::class,'member_id','member_id');

    }
}
