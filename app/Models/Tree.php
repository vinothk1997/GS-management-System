<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;
    protected $fillable=['land_id','tree_name','tree_type','no_of_tree'];
    protected $primaryKey=['land_id','tree_name'];
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;
}