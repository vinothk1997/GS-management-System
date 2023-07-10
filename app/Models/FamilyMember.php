<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Education;
use App\Models\Vehicle;

class FamilyMember extends Model
{
    use HasFactory;
    protected $primaryKey='member_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['member_id','first_name','last_name','nic','dob','gender','mobile','family_id',
    'birth_certificate_no','relationship','school','learning_place_type',
    'monthly_income','driving_licence_no','occupation_id','education_id'];
    public $timestamps = false;

    public function Death(){
        
        return $this->hasOne(Death::class,'member_id');
    }

    public function Education(){
        
        return $this->belongsTo(Education::class,'education_id','education_id');
    }

    public function Vehicle(){
        return $this->belongsTo(Vehicle::class,'member_id','member_id');

    }


}