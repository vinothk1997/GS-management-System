<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyHead;
use App\Models\Staff;
use App\Models\Religion;
use App\Models\Ethnic;
use App\Models\Occupation;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
 
    public function showUserDetails(){
        $user=session()->get('user');
        // return $user;
        if($user['user_type']=='family head'){
            $data=FamilyHead::where('family_id',$user['user_id'])->first();
            // return $data;
            $religion=Religion::find($data->religion_id)->pluck('name')->first();
            $ethnic=Ethnic::find($data->ethnic_id)->pluck('name')->first();
            $occupation=Occupation::find($data->occupation_id)->pluck('name')->first();
            return view('profile.showFamilyHead',['familyHead'=>$data],compact('religion','ethnic','occupation'));
        }
        else{
            $data=Staff::where('staff_id',$user['user_id'])->first();
            $religions=Religion::pluck('name');
            return view('profile.showStaff',['staff'=>$data]);
            
        }
    }

    public function editProfileDetails(){
        $user=session()->get('user');
        if($user['user_type']=='family head'){
            $religions=Religion::pluck('name');
            $ethnics=Ethnic::pluck('name');
            $occupations=Occupation::pluck('name');
            $familyHead=FamilyHead::find($user['user_id']);
            $religion=Religion::find($familyHead->religion_id)->pluck('name')->first();
            $ethnic=Ethnic::find($familyHead->ethnic_id)->pluck('name')->first();
            $occupation=Occupation::find($familyHead->occupation_id)->pluck('name')->first();;
            return view('profile.editFamilyHead',compact('familyHead','religion','ethnic','occupation','religions','ethnics','occupations'));
        }
        else{
            $staff=Staff::find($user['user_id']);
            return view('profile.editStaff',compact('staff'));
        }

    }
    public function updateProfileDetail(Request $req){
        $user=session()->get('user');
        if($user['user_type']=='family head')
        {
        $mobile= FamilyHead::find($user['user_id'])->mobile;
        // 
        $religionId=Religion::where('name',$req->religion)->pluck('religion_id')->first();
        $ethnicId=Ethnic::where('name',$req->ethnic)->pluck('ethnic_id')->first();
        $occupationId=Occupation::where('name',$req->occupation)->pluck('occupation_id')->first();
        $familyHead= FamilyHead::find($user['user_id']);
        $familyHead->first_name=$req->fname;
        $familyHead->last_name=$req->lname;
        // $familyHead->mobile=$req->mobile;
        $familyHead->permanent_address=$req->p_address;
        $familyHead->temporary_address=$req->t_address;
        $familyHead->internet=$req->internet;
        $familyHead->religion_id=$religionId;
        $familyHead->occupation_id=$occupationId;
        $updated=$familyHead->save();
    }
    else{
        $mobile= Staff::find($user['user_id'])->mobile;

        $staff= Staff::find($user['user_id']);
        $staff->first_name=$req->fname;
        $staff->last_name=$req->lname;
        $staff->address=$req->address;
        $updated=$staff->save();
    }
        if($updated){
            if($mobile==$req->mobile){
                return redirect()->route('profile.showUserDetails');
            }
            else{
                $mobile=substr($req->mobile,1,9);
                $verificationCode=rand(1000,9999);
                $verifiedUser= User::where('name',$user['name'])->first();
                $verifiedUser->verification_code=$verificationCode;
                $verifiedUser->save();
                // sms gateway
                $gateUser = "94769669804";
                $password = "3100";
                $text = urlencode("Your verification code: ".$verificationCode);
                $to = "94".$mobile;

                $baseurl ="http://www.textit.biz/sendmsg";
                $url = "$baseurl/?id=$gateUser&pw=$password&to=$to&text=$text";
                $ret = file($url);

                $res= explode(":",$ret[0]);

                if (trim($res[0])=="OK")
                {
                // echo "Message Sent - ID : ".$res[1];
                session()->put('verificationCode_profile_mobile',$mobile);
                echo '<script>alert("please check your mobile")</script>';
                return view('profile.verification_code_profile');
                }
                else
                {
                // echo "Sent Failed - Error : ".$res[1].
                return redirect()->back()->with(['IsNotconnection'=>true]);
                }
                // return "matched mobile number ";
            }
        }
    }

    public function verifyCode(Request $req){
        $user=session()->get('user');
        $verificationCode= User::where('name',$user['name'])->first()->verification_code;
        if($verificationCode==$req->verification_code){  
            // $user['user_id'];
        if($user['user_type']=='family head'){
            $familyHead= FamilyHead::find($user['user_id']);
            $familyHead->mobile=session()->get('verificationCode_profile_mobile');
            $familyHead->save();
            return redirect()-> route('profile.showUserDetails');
            
        }
        else{
            $staff=Staff::where('staff_id',$user['user_id'])->first();
            $staff->mobile=session()->get('verificationCode_profile_mobile');
            $staff->save();
            return redirect()-> route('profile.showUserDetails');

        }
    }
        else{

            echo '<script>alert("your verification code mismatched !")</script>';
            return redirect()->back();
            
        }
    }
}