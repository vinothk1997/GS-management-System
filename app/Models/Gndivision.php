<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GnDivision extends Model
{
    use HasFactory;
    protected $table='gn_divisions';
    protected $primaryKey='gn_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['gn_id','name','code','division_id'];
    public $timestamps = false;
}