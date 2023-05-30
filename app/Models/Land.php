<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GnDivision;

class Land extends Model
{
    use HasFactory;
    protected $fillable=['land_id','member_id','family_id','land_type','land_gn_id','address','area','reg_no','document_file'];
    protected $primaryKey='land_id';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=false;
    public function GN(){
        return $this->belongsTo(GnDivision::class,'land_gn_id','gn_id');
    }
}

