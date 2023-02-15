<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;

class FamilyMemberController extends Controller
{
    function index(){
        $familyMembers=FamilyMember::all();
        return view('family-member.index',compact('familyMembers'));
    }
    function create($familyId){
        return view('family-head.create',compact('ethnics','religions','occupations'));
    }
    function store(Request $req){
        $religionId=Religion::where('name',$req->religion)->pluck('religion_id')->first();
        $ethnicId=Ethnic::where('name',$req->ethnic)->pluck('ethnic_id')->first();
        $occupationId=Occupation::where('name',$req->occupation)->pluck('occupation_id')->first();
        $lastFamilyId=FamilyHead::pluck('family_id')->last();
        if(!$lastFamilyId){
            $familyId="FH/GN001/001";
        }
        else{
            $familyId=++$lastFamilyId;
        }
        $familyHead = new FamilyHead;
        $familyHead->family_id=$familyId;
        $familyHead->first_name=$req->fname;
        $familyHead->last_name=$req->lname;
        $familyHead->nic=$req->nic;
        $familyHead->dob=$req->dob;
        $familyHead->gender=$req->gender;
        $familyHead->mobile=$req->mobile;
        $familyHead->permanent_address=$req->p_address;
        $familyHead->temporary_address=$req->t_address;
        $familyHead->house_no=$req->house_no;
        $familyHead->card_type=$req->card_type;
        $familyHead->internet=$req->internet;
        $familyHead->married_certificate_no=$req->married_c_no;
        $familyHead->gn_id=$req->gn_id;
        $familyHead->religion_id=$religionId;
        $familyHead->ethnic_id=$ethnicId;
        $familyHead->occupation_id=$occupationId;
        $familyHead->save();
        return redirect()->back();
    }
    function show($familyId){
        $members=FamilyMember::where('family_id',$familyId)->get();
        return $members;
    }
    function edit($ethnic){
        $ethnic=Ethnic::find($ethnic);
        return view('ethnic.edit',compact('ethnic'));
    }
    function update(Request $req,$ethnic){
        $ethnic= Ethnic::find($ethnic);
        $ethnic->name=$req->name;
        $ethnic->save();
        return redirect()->route('ethnic.index');
    }
    function destroy($ethnic){
        Ethnic::destroy($ethnic);
        return redirect()->back();
    }
}