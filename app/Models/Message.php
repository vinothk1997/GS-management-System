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
}