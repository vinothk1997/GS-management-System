<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livelihood extends Model
{
    use HasFactory;
    protected $fillable=['livelihood_id','start_date','end_date','amount','assist_type_id','family_id'];
    protected $primaryKey='livelihood_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;

    public function AssistType(){
        return $this->hasOne(AssistType::class,'assist_type_id','assist_type_id');
    }
}

