<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;
    protected $fillable=['family_id','type_of_residence','type_of_house','roof','lightning','water_facility','sanitary_facility'];
    protected $primaryKey='family_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;

}