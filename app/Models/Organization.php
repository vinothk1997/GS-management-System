<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table='organizations';
    protected $primaryKey='organization_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['organization_id','name','description','mobile','landline_no'];
    public $timestamps = false;
}