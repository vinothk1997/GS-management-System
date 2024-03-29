<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFamilyMemberRequest;
use App\Models\FamilyMember;
use App\Models\Education;
use App\Models\Occupation;
use App\Models\SocialService;
use App\Models\VotingDetail;
use App\Models\Pension;
use App\Models\Death;
use App\Models\Vehicle;
use App\Models\DifferentlyAbledPerson;
use App\Models\Land;
use Carbon\Carbon;

class FamilyMemberController extends Controller
{
    function index(){
        $familyMembers=FamilyMember::all();
        return view('family-member.index',compact('familyMembers'));
    }
    function create(Request $req){
        $educations=Education::all();
        $occupations=Occupation::all();
        $familyId=$req->familyId;
        return view('family-member.create',compact('educations','occupations','familyId'));
    }
    function store(StoreFamilyMemberRequest $req){
        $lastMemberId=FamilyMember::pluck('member_id')->last();
        if(!$lastMemberId){
            $memberId="FH/GN001/001/M/01";
        }
        else{
            $memberId=++$lastMemberId;
        }
        $member = new FamilyMember;
        $member->member_id=$memberId;
        $member->first_name=$req->fname;
        $member->last_name=$req->lname;
        $member->nic=$req->nic;
        $member->dob=$req->dob;
        $member->gender=$req->gender;
        $member->mobile=$req->mobile;
        $member->birth_certificate_no=$req->birth_c_no;
        $member->relationship=$req->relationship;
        $member->school=$req->school;
        $member->learning_place_type=$req->learning_place_type;
        $member->monthly_income=$req->monthly_income;
        $member->driving_licence_no=$req->driving_licence_no;
        $member->occupation_id=$req->occupation;
        $member->education_id=$req->education;
        $member->family_id=$req->familyId;
        $member->save();
        return redirect()->back();
    }
    function show(Request $req){
        $familyMember=FamilyMember::find($req->memberId);
        $occupation=Occupation::where('occupation_id',$familyMember->occupation_id)->pluck('name')->first();
        $education=Education::where('education_id',$familyMember->education_id)->pluck('name')->first();
        $familyMember->setAttribute('occupation',$occupation );
        $familyMember->setAttribute('education',$education);

        $socialServices=SocialService::where('member_id',$req->memberId)->get();
        $votingDetails=VotingDetail::where('member_id',$req->memberId)->get();
        $pensions=Pension::where('member_id',$req->memberId)->get();
        $deaths=Death::where('member_id',$req->memberId)->get();
        $defferentlyAbledPersons=DifferentlyAbledPerson::where('member_id',$req->memberId)->get();
        $lands=Land::where('member_id',$req->memberId)->get();
        $vehicles=Vehicle::where('member_id',$req->memberId)->get();
        $familyMember->setAttribute('vote',self::checkVote($familyMember->dob));
        // return $vehicles;
        if(count($deaths)<1){
            return view('family-member.show',compact('familyMember','socialServices','votingDetails'
            ,'pensions','deaths','defferentlyAbledPersons','lands','vehicles'));
        }
        else{
            return view('family-member.dead-show',compact('familyMember','socialServices','votingDetails'
            ,'pensions','deaths','defferentlyAbledPersons','lands','vehicles'));
        }
    }

    function edit(Request $req){
        $educations=Education::pluck('name');
        $occupations=Occupation::pluck('name');
        $memberId=$req->memberId;
        $familyMember=FamilyMember::find($memberId);
        $selectedOccupation=Occupation::where('occupation_id',$familyMember->occupation_id)->pluck('name')->first();
        $selectedEducation=Education::where('education_id',$familyMember->education_id)->pluck('name')->first();
        return view('family-member.edit',compact('memberId','familyMember','educations','occupations','selectedOccupation','selectedEducation'));
    }
    function update(Request $req){
        $educationId=Education::where('name',$req->education)->pluck('education_id')->first();
        $occupationId=Occupation::where('name',$req->occupation)->pluck('occupation_id')->first();
        $member =FamilyMember::find($req->memberId);
        $member->first_name=$req->fname;
        $member->last_name=$req->lname;
        $member->nic=$req->nic;
        $member->dob=$req->dob;
        $member->gender=$req->gender;
        $member->mobile=$req->mobile;
        $member->birth_certificate_no=$req->birth_c_no;
        $member->relationship=$req->relationship;
        $member->school=$req->school;
        $member->learning_place_type=$req->learning_place_type;
        $member->monthly_income=$req->monthly_income;
        $member->driving_licence_no=$req->driving_licence_no;
        $member->occupation_id=$occupationId;
        $member->education_id=$educationId;
        $member->save();
        return redirect()->action(
            [FamilyHeadController::class, 'show'], ['familyId' => $member->family_id]
        );
    }

    function destroy(Request $req){
        FamilyMember::destroy($req->memberId);
        return redirect()->back();
    }

   public static function checkVote($dob){
     // check voting Eligibility
     $yearOfBirth=Carbon::parse($dob)->year;
     $age=Carbon::today()->year-$yearOfBirth;
     if($age>18){
        return 'EligibleForVote';
     }
     else{
         return '';
     }
    }
}