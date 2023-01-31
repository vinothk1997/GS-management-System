<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    use HasFactory;
    protected $primaryKey='division_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['division_id','name','district_id'];
    public $timestamps = false;
}