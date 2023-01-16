<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistType extends Model
{
    use HasFactory;
    protected $fillable=['assist_type_id','name'];
    protected $primaryKey='assist_type_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;
}