<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingDetail extends Model
{
    use HasFactory;
    protected $primaryKey="Voting_id";
    protected $fillable=['Voting_id','vote_no','year','family_id','member_id'];
    public $timestamps=false;
}