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
  
  public function create(Request $req){
    $family_id='';
    $family_member_id='';
    if($req->family_id);{
        $family_id=$req->family_id;
    }

    if($req->member_id){
        $family_member_id=$req->member_id;
    }
    return view('voting-detail.create',compact('family_id','family_member_id'));
  }
  
  public function store(StoreVoteDetailRequest $req){
    $votingDetail=new VotingDetail;
    $votingDetail->vote_no=$req->vote_no;
    $votingDetail->year=$req->year;
    $votingDetail->family_id=$req->family_id;
    $votingDetail->member_id=$req->member_id;
    $votingDetail->save();

    if(!empty($votingDetail->member_id)){
      return redirect()->to('/family-Members/show?memberId='.$votingDetail->member_id);
      }
    else{
        return redirect()->to('/family-Heads/other-details?familyId='.$votingDetail->family_id);

    } 

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
    if(!empty($socialService->member_id)){
      return redirect()->to('/family-Members/show?memberId='.$votingDetail->member_id);
      }
    else{
        return redirect()->to('/family-Heads/other-details?familyId='.$votingDetail->family_id);

    } 
  }
  
  public function destroy(Request $req){
    VotingDetail::find($req->voting_id)->delete();
    return redirect()->back();

  }
  
}