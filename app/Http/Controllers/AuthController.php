<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FamilyHead;
use App\Models\Staff;
use Session;

class AuthController extends Controller
{
    function showLogin(){
        return view('auth.login');
    }
    function login(Request $req){
        $user=User::where('name',$req->user_name)->first();
        if(!$user){
            return view('auth.login',['message'=>"user_error"]);
        }
        
        else{
            
            if($user->attempt<3){
                if(!Hash::check($req->password,$user->password)){
                    $lastAttempt=$user->attempt;
                    $user=User::find($user->user_id);
                    $user->attempt=++$lastAttempt;
                    $user->save();
                    return view('auth.login',['message'=>"password_error"]);
                }
                else{
                    $user=User::find($user->user_id);
                    $user->attempt='0';
                    $user->save();

                    if($user->status=='active'){
                        session([
                            'name' => $user->name,
                            "user_type"=>$user->user_type
                        ]);
                        return redirect()->route('staff.index');
                    }
                    else{
                        return "Your account has been disabled,contact administrator";
                    }
                   
                }
            }
            else{
                session()->flash('name', $user->name);
                return view('auth.forget_password');
                
            }

        }
      
    }
    function customForgetPassword(){
        if(session()->has('name')){
             session::forget('name');
        }
        else{
            
        }
        return view('auth.forget_password');
    }
    
    function recover(Request $req){
        $user=User::where('name',$req->user_name)->first();
        if(!$user){
            return view('auth.forget_password',['wrong_user'=>true]);
        }
        else{
            //determin as to select family head or staff to find mobile 
            if($user->status="family head"){
                $user_mobile=FamilyHead::where('nic',$user->name)->pluck('mobile')->first();
            }
            else{
                $user_mobile=Staff::where('nic',$user->nic)->pluck('mobile')->first();
            }
            // determine request mobile and database mobile is matched.
            if($user_mobile==$req->mobile){
             return view('auth.verification_code',['user_name'=>$user->name]);

            //     $verificationCode=rand(1000,9999);
            //     $verifiedUser= User::where('name',$req->user_name)->first();
            //     $verifiedUser->verification_code=$verificationCode;
            //     $verifiedUser->save();
            //     // sms gateway
            //     $gateUser = "94769669804";
            //     $password = "3100";
            //     $text = urlencode("Your verification code: ".$verificationCode);
            //     $to = "94".$user_mobile;

            //     $baseurl ="http://www.textit.biz/sendmsg";
            //     $url = "$baseurl/?id=$gateUser&pw=$password&to=$to&text=$text";
            //     $ret = file($url);

            //     $res= explode(":",$ret[0]);

            //     if (trim($res[0])=="OK")
            //     {
            //     // echo "Message Sent - ID : ".$res[1];
            //     return view('auth.verification_code',['user_name'=>$user->name]);
            //     }
            //     else
            //     {
            //     // echo "Sent Failed - Error : ".$res[1].
            //     return redirect()->back()->with(['IsNotconnection'=>true]);
            //     }
            //     // return "matched mobile number ";
            // }
            // else{
            //     return view('auth.forget_password',['wrong_mobile'=>true]);
            }
        }
        
    }
    function verifyCode(Request $req){
        // return $req;
        $user=User::where('name',$req->user_name)->first();
        if($user->verification_code==$req->verification_code){
            return view('auth.forget_change_password',["user_name"=>$user->name]);
        }

        
    }
    function storeConfirmedpassword (Request $req){
        $newPassword=$req->new_password;
        $confirmNewPassword=$req->confirm_new_password;
        if($newPassword===$confirmNewPassword){
            $newHashedPassword=Hash::make($newPassword);
            $updateUser=User::where('name',$req->user_name)->first();
            $updateUser->password=$newHashedPassword;
            $updateUser->save();
            return redirect()->route('auth.index')->with(['updated'=>'Your new password has been updated']);
        }
    }
    
}