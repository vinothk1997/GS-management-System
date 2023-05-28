<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VotingDetail;
use App\Models\FamilyMember;
use App\Http\Requests\StoreVoteDetailRequest;

class VotingDetailController extends Controller
{
  public function index(){
    $votingDetails=VotingDetail::all();
    return view('voting-detail.index',compact('votingDetails'));

  }
  
  public function create($id){
    $member_id=urldecode($id);
    $member=FamilyMember::find($member_id);
    return view('voting-detail.create',compact('member'));
  }
  
  public function store(StoreVoteDetailRequest $req){
    $votingDetail=new VotingDetail;
    $votingDetail->vote_no=$req->vote_no;
    $votingDetail->year=$req->year;
    $votingDetail->family_id=$req->family_id;
    $votingDetail->member_id=$req->member_id;
    $votingDetail->save();

    return redirect()->back();

  }
  
  public function edit(Request $req){
    $votingDetail=VotingDetail::find($req->voting_id);
    return view('voting-detail.edit',compact('votingDetail'));

  }
  
  public function update(StoreVoteDetailRequest $req){
    $votingDetail=VotingDetail::find($req->voting_id);
    $votingDetail->vote_no=$req->vote_no;
    $votingDetail->year=$req->year;
    $votingDetail->save();
    return redirect()->to('/family-Members/show?memberId='.$votingDetail->member_id);
  }
  
  public function destroy(Request $req){
    VotingDetail::find($req->voting_id)->delete();
    return redirect()->back();

  }
  
}