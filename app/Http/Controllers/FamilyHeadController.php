<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFamilyHeadRequest;
use App\Models\Ethnic;
use App\Models\Occupation;
use App\Models\Religion;
use App\Models\FamilyHead;
use App\Models\FamilyMember;

class FamilyHeadController extends Controller
{
    function index(){
        $familyHeads=FamilyHead::all();
        return view('family-head.index',compact('familyHeads'));
    }
    function create(){
        $ethnics=Ethnic::pluck('name');
        $religions=Religion::pluck('name');
        $occupations=Occupation::pluck('name');
        return view('family-head.create',compact('ethnics','religions','occupations'));
    }
    function store(StoreFamilyHeadRequest $req){
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
    function show(Request $req,$familyId=null){
        $familyId=$req->familyId;
        $familyHead=FamilyHead::find($familyId);
        $familyMembers=FamilyMember::where('family_id',$familyId)->get();
        $religion=Religion::find($familyHead->religion_id)->pluck('name')->first();
        $ethnic=Ethnic::find($familyHead->ethnic_id)->pluck('name')->first();
        $occupation=Occupation::find($familyHead->occupation_id)->pluck('name')->first();
        return view('family-head.show',compact('familyMembers','familyId','familyHead','religion','ethnic','occupation'));
    }
    function edit(Request $req){
        $religions=Religion::pluck('name');
        $ethnics=Ethnic::pluck('name');
        $occupations=Occupation::pluck('name');
        $familyHead=FamilyHead::find($req->familyId);
        $religion=Religion::find($familyHead->religion_id)->pluck('name')->first();
        $ethnic=Ethnic::find($familyHead->ethnic_id)->pluck('name')->first();
        $occupation=Occupation::find($familyHead->occupation_id)->pluck('name')->first();;
        return view('family-head.edit',compact('familyHead','religion','ethnic','occupation','religions','ethnics','occupations'));
    }
    function update(Request $req){
        // return $req;
        $religionId=Religion::where('name',$req->religion)->pluck('religion_id')->first();
        $ethnicId=Ethnic::where('name',$req->ethnic)->pluck('ethnic_id')->first();
        $occupationId=Occupation::where('name',$req->occupation)->pluck('occupation_id')->first();
        $familyHead= FamilyHead::find($req->familyId);
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
        $familyHead->religion_id=$religionId;
        $familyHead->ethnic_id=$ethnicId;
        $familyHead->occupation_id=$occupationId;
        $familyHead->save();
        return redirect()->route('familyHead.index');
    }
    function destroy(Request $req){
        FamilyHead::destroy($req->familyId);
        return redirect()->back();
    }
}