<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreFamilyHeadRequest;
use App\Models\Ethnic;
use App\Models\Occupation;
use App\Models\Education;
use App\Models\Religion;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\SocialService;
use App\Models\VotingDetail;
use App\Models\Pension;
use App\Models\Death;
use App\Models\Vehicle;
use App\Models\DifferentlyAbledPerson;
use App\Models\Land;
use Carbon\Carbon;
use App\Models\User;
use DB;

class FamilyHeadController extends Controller
{
    function index(){
        // return session()->get('user');
        if(session()->get('user') && session()->get('user')['user_type']=='family head'){
            $familyHeads=DB::table('family_heads')
            ->join('users','family_id','user_id')
            ->where('users.name',session()->get('user')['name'])
            ->select('family_heads.*','users.status')
            ->get();
            return view('family-head.index',compact('familyHeads'));

        }
        $familyHeads=DB::table('family_heads')
        ->join('users','family_id','user_id')
        ->select('family_heads.*','users.status')
        ->get();
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
        $ocupationId=Occupation::where('name',$req->occupation)->pluck('occupation_id')->first();
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
        // insert to user table
        $user=new User;
        $user->user_id=$familyId;
        $user->name=$req->nic;
        $user->password= Hash::make($req->nic);
        $user->user_type='family head';
        $user->attempt='0';
        $user->status='active';
        $user->save();
        return redirect()->back();
    }
    function show(Request $req){
        $familyId=$req->familyId;
        $familyHead=DB::table('family_heads')
        ->join('users','family_id','user_id')
        ->first();
        // return $familyHead;
        // $familyHead=FamilyHead::find($familyId);
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
        $familyHead=DB::table('users')
        ->where('user_id',$req->familyId)
        ->update(['status'=>'inactive']);
        return redirect()->back();  
    }

    function showOtherDeatails(Request $req){
        $familyHead=FamilyHead::find($req->familyId);
        // return $familyHead;
        $occupation=Occupation::where('occupation_id',$familyHead->occupation_id)->pluck('name')->first();
        $education=Education::where('education_id',$familyHead->education_id)->pluck('name')->first();
        $familyHead->setAttribute('occupation',$occupation );
        $familyHead->setAttribute('education',$education);
        $socialServices=SocialService::where('family_id',$req->familyId)->get();
        $votingDetails=VotingDetail::where('family_id',$req->familyId)->get();
        $pensions=Pension::where('family_id',$req->familyId)->get();
        $deaths=Death::where('family_id',$req->familyId)->get();
        $defferentlyAbledPersons=DifferentlyAbledPerson::where('family_id',$req->familyId)->get();
        $lands=Land::where('family_id',$req->familyId)->get();
        $vehicles=Vehicle::where('family_id',$req->familyId)->get();
        $familyHead->setAttribute('vote',self::checkVote($familyHead->dob));

         return view('family-head.other-details',compact('familyHead','socialServices','votingDetails'
        ,'pensions','deaths','defferentlyAbledPersons','lands','vehicles'));
        
    
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