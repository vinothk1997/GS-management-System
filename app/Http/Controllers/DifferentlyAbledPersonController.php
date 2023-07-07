<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DifferentlyAbledPerson;
use App\Http\Requests\StoreDifferentlyAbledPersonRequest;

class DifferentlyAbledPersonController extends Controller
{
    public function index(){
        $differentlyAbledPersons=DifferentlyAbledPerson::all();
        return view('differentlyAbledPerson.index',compact('differentlyAbledPersons'));

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
        return view('differentlyAbledPerson.create',compact('family_id','family_member_id'));

    }
    public function store(StoreDifferentlyAbledPersonRequest $req){
        $differentlyAbledPerson=new DifferentlyAbledPerson;
        $differentlyAbledPerson->type=$req->type;
        $differentlyAbledPerson->date=$req->date;
        $differentlyAbledPerson->reason=$req->reason;
        $differentlyAbledPerson->monthly_assist=$req->monthly_assist;
        $differentlyAbledPerson->amount=$req->amount;
        $differentlyAbledPerson->family_id=$req->family_id;
        $differentlyAbledPerson->member_id=$req->member_id;
        $differentlyAbledPerson->save();
        if(!empty($differentlyAbledPerson->member_id)){
            return redirect()->to('/family-Members/show?memberId='.$differentlyAbledPerson->member_id);
            }
          else{
              return redirect()->to('/family-Heads/other-details?familyId='.$differentlyAbledPerson->family_id);
      
          }

    }
    public function edit(Request $req){
        $differentlyAbledPerson=DifferentlyAbledPerson::find($req->id);
        return view('differentlyAbledPerson.edit',compact('differentlyAbledPerson'));
    }
    public function update(Request $req){
        $differentlyAbledPerson=DifferentlyAbledPerson::find($req->id);
        $differentlyAbledPerson->type=$req->type;
        $differentlyAbledPerson->date=$req->date;
        $differentlyAbledPerson->reason=$req->reason;
        $differentlyAbledPerson->monthly_assist=$req->monthly_assist;
        $differentlyAbledPerson->amount=$req->amount;
        $differentlyAbledPerson->save();
        return redirect()->to('/family-Members/show?memberId='.$differentlyAbledPerson->member_id);


    }
    public function confirmDelete(){

    }
    public function destroy(Request $req){
        $differentlyAbledPerson=DifferentlyAbledPerson::find($req->id);
        DifferentlyAbledPerson::destroy($req->id);
        if(!empty($differentlyAbledPerson->member_id)){
            return redirect()->to('/family-Members/show?memberId='.$differentlyAbledPerson->member_id);
            }
          else{
              return redirect()->to('/family-Heads/other-details?familyId='.$differentlyAbledPerson->family_id);
      
        } 
    }
    
}