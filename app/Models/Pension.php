<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    use HasFactory;
    protected $primaryKey='pension_id';
    protected $fillable=['pension_id','pension_no','amount','bank','category'];
    public $timestamps = false;
}