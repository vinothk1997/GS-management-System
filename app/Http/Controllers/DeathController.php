<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Death;

class DeathController extends Controller
{
    public function index(){
        $deaths=Death::all();
        return view('death.index',compact('deaths'));
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
        return view('death.create',compact('family_id','family_member_id'));

    }
    public function store(Request $req ){
        $death=new Death;
        $death->member_id=$req->member_id;
        $death->family_id=$req->family_id;
        $death->death_date=$req->death_date;
        $death->place=$req->place;
        $death->reason=$req->reason;
        $death->save();

        if(!empty($death->member_id)){
            return redirect()->to('/family-Members/show?memberId='.$death->member_id);
            }
          else{
              return redirect()->to('/family-Heads/other-details?familyId='.$death->family_id);
      
          } 

    }
    public function edit(Request $req){
        $member_id=$req->member_id;
        $death=Death::find($req->death_id);
        return view('death.edit',compact('death','member_id'));

    }
    public function update(Request $req){
        $death=Death::find($req->death_id);
        $death->death_date=$req->death_date;
        $death->place=$req->place;
        $death->reason=$req->reason;
        $death->save();
        
        if(!empty($death->member_id)){
            return redirect()->to('/family-Members/show?memberId='.$death->member_id);
            }
          else{
              return redirect()->to('/family-Heads/other-details?familyId='.$death->family_id);
      
          } 

    }

    public function destroy(Request $req){
        Death::destroy($req->death_id);
        return redirect()->back();
    }
    
}