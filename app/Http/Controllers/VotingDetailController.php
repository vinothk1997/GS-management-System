<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VotingDetail;

class VotingDetailController extends Controller
{
  public function index(){
    $votingDetails=VotingDetail::all();
    return view('voting-detail.index',compact('votingDetails'));

  }
  
  public function create(){
    return view('voting-detail.create');
  }
  
  public function store(Request $req){
    $votingDetail=new VotingDetail;
    $votingDetail->vote_no=$req->vote_no;
    $votingDetail->year=$req->year;
    $votingDetail->family_id=$req->family_id;
    $votingDetail->family_id=$req->family_id;
    $votingDetail->save();

  }
  
  public function edit(Request $req){
    $votingDetail=VotingDetail::find($req->voting_id);
    return view('voting-detail.edit',compact('votingDetail'));

  }
  
  public function update(Request $req){
    $votingDetail=VotingDetail::find($req->voting_id);
    $votingDetail->vote_no=$req->vote_no;
    $votingDetail->year=$req->year;
    $votingDetail->save();
    return redirect()->route('votingDetail.index');
  }
  
  public function destroy(Request $req){
    VotingDetail::destroy($req->voting_id);
    return redirect()->route('votingDetail.index');

  }
  
}