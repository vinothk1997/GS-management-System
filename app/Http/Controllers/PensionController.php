<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pension;
use App\Http\Requests\StorePensionRequest;

class PensionController extends Controller
{
  
    public $banks=['Bank of ceylon','Peoples bank','HNB','Commercial'];

    public function index(){
        $pensions=Pension::all();
        // return $pensions;
        return view('pension.index',compact('pensions'));
    }

    public function create(Request $req){
        $banks=$this->banks;
        $family_id='';
        $family_member_id='';
        if($req->family_id);{
            $family_id=$req->family_id;
        }
    
        if($req->member_id){
            $family_member_id=$req->member_id;
        }
        return view('pension.create',compact('family_id','family_member_id','banks'));

    }
    public function store(StorePensionRequest $req){
        $pension = new Pension;
        $pension->pension_no=$req->pension_no;
        $pension->bank=$req->bank;
        $pension->amount=$req->amount;
        $pension->category=$req->category;
        $pension->family_id=$req->family_id;
        $pension->member_id=$req->member_id;
        $pension->save();

        if(!empty($pension->member_id)){
            return redirect()->to('/family-Members/show?memberId='.$pension->member_id);
            }
          else{
              return redirect()->to('/family-Heads/other-details?familyId='.$pension->family_id);
      
          } 

    }
    public function edit(Request $req){
        $pension=Pension::find($req->pension_id);
        $member_id=$req->member_id;
        $banks=$this->banks;
        return view('pension.edit',compact('pension','banks','member_id'));

    }
    public function update(Request $req){
        $pension=Pension::find($req->pension_id);
        $pension->pension_no=$req->pension_no;
        $pension->bank=$req->bank;
        $pension->amount=$req->amount;
        $pension->category=$req->category;
        $pension->save();
        
        if(!empty($pension->member_id)){
            return redirect()->to('/family-Members/show?memberId='.$pension->member_id);
            }
          else{
              return redirect()->to('/family-Heads/other-details?familyId='.$pension->family_id);
      
          } 

    }

    public function confirmDelete(){

    }

    public function destroy(Request $req){
        Pension::destroy($req->pension_id);
        return redirect()->to('/family-Members/show?memberId='.$req->member_id);
        
    }
}