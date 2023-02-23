<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable=['family_id','donation_id','date','organization_id','type','amount','description'];
    protected $primaryKey='donation_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;
}