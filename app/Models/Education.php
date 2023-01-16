<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    use HasFactory;
    protected $table='educations';
    protected $primaryKey='education_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['education_id','name'];
    public $timestamps = false;
}