<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FamilyHead extends Model
{
    use HasFactory;
    protected $primaryKey='family_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['family_id','first_name','last_name','nic','dob','gender','mobile','permanent_address',
    'temporary_address','house_no','card_type','internet',
    'married_certificate_no','gn_id','religion_id','ethnic_id','occupation_id'];
    public $timestamps = false;

    public function User(){
        return $this->hasOne(User::class,'user_id','family_id');
    }
}