<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $primaryKey='messsage_id';
    protected $keyType='string';
    protected $fillable=['message_id','from_id','to_id','subject','message','date','time','inbox_deleted','sent_deleted','read_status','family_id','staff_id'];
    public $incrementing=false;
    public $timestamps=false;

    public function getToName(){
        if(substr($this->to_id,0,2)=="ST"){
            return $this->belongsTo(Staff::class,'to_id','staff_id');
        }
        else{
            return $this->belongsTo(FamilyHead::class,'to_id','family_id');
        }
    }
    public function getFromName(){
        if(substr($this->from_id,0,2)=="ST"){
            return $this->belongsTo(Staff::class,'from_id','staff_id');
        }
        else{
            return $this->belongsTo(FamilyHead::class,'from_id','family_id');
        }
    }

    public function user(){
        return $this->belongsTo(User::class,'message_id','user_id');
    }
   
}