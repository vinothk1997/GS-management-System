<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffWorkplace extends Model
{
    use HasFactory;
    protected $primaryKey=['staff_id','start_date'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['staff_id','start_date','end_date','designation','place_id'];
    public $timestamps = false;
}