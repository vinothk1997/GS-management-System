<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;
    protected $fillable=['death_date','place','reason','member_id'];
    protected $primaryKey='death_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;
}