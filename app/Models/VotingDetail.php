<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingDetail extends Model
{
    use HasFactory;
    protected $primaryKey="voting_id";
    protected $fillable=['voting_id','vote_no','year','family_id','member_id'];
    public $timestamps=false;
}