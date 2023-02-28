<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialService extends Model
{
    use HasFactory;
    protected $fillable=['social_service_id','member_id','family_id','type','amount','description','year'];
    protected $primaryKey='social_service_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;
}