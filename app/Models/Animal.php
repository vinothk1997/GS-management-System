<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    use HasFactory;
    protected $fillable=['family_id','type_of_animal','no_of_animal'];
    protected $primaryKey=['family_id','type_of_animal'];
    protected $keyType='array';
    public $incrementing=false;
    public $timestamps=false;

}