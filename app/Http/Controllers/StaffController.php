<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Models\StaffWorkplace;
use App\Models\User;
use App\Models\Division;
use App\Models\GNDivision;
use DB;
use Session;
use Carbon\Carbon;

class StaffController extends Controller
{
    function index(){
        $staffs=DB::table('staff')
        ->join('users','staff.staff_id','users.user_id')
        ->select('staff.*','users.status')->get();
        // return $staff;
        // $staffs=Staff::all();
        return view('staff.index',compact('staffs'));
    }
    function create(){
        $designationForDS=['DS','GS','Clerk'];
        $designationForGS=['GS','Clerk'];
        if(session()->get('user.user_type')=='DS'){
            $designations=$designationForDS;
        }
        elseif(session()->get('user.user_type')=='GS'){
            $designations=$designationForGS;
        }
        else{
            $designations=['DS'];
        }
        return view('staff.create',compact('designations'));
    }
    function store(StoreStaffRequest $req){
        $lastStaffId=Staff::pluck('staff_id')->last();
        if(!$lastStaffId){
            $StaffId="ST001";
        }
        else{
            $StaffId=++$lastStaffId;
        }
        $staff = new Staff;
        $staff->staff_id=$StaffId;
        $staff->first_name=$req->fname;
        $staff->last_name=$req->lname;
        $staff->nic=$req->nic;
        $staff->dob=$req->dob;
        $staff->gender=$req->gender;
        $staff->mobile=$req->mobile;
        $staff->address=$req->address;
        $staff->save();
        // insert to staffworkplace table
        if($req->designation=="DS"){
            $placeId=Division::where('name',$req->workplace)->pluck('division_id')->first();
        }
        else{
            // return 'hello';
            $placeId=GNDivision::where('name',$req->workplace)->pluck('gn_id')->first();
        }
        $staffWorkplace=new StaffWorkplace;
        $staffWorkplace->staff_id=$StaffId;
        $staffWorkplace->start_date=Carbon::now();
        $staffWorkplace->designation=$req->designation;
        $staffWorkplace->place_id=$placeId;
        $staffWorkplace->save();
        // Insert user table

        $user=new User;
        $user->user_id=$StaffId;
        $user->name=$req->nic;
        $user->password=Hash::make($req->nic);
        $user->attempt='0';
        $user->user_type=$req->designation;
        $user->status='active';
        $user->save();
        return redirect()->back();
    }
    function show($staff){
        $staffId=$staff;
        $staff=DB::table('staff')
        ->join('users','staff.staff_id','users.user_id')
        ->where('staff.staff_id',$staff)
        ->select('staff.*','users.status','users.user_type')->first();
        
         $staffs=DB::table('staff')
        ->join('staff_workplaces','staff.staff_id','staff_workplaces.staff_id')
        ->join('users','staff.staff_id','users.user_id')
        ->where('staff.staff_id',$staffId)
        ->select('staff.*','staff_workplaces.designation','users.status')->get();
        $staffWorkplaces=[];
        foreach($staffs as $obj){
            if($obj->designation =="DS"){
                    $staffWorkplaces=DB::table('staff_workplaces')
                    ->join('divisions','staff_workplaces.place_id','divisions.division_id')
                    ->get();
            }
            else{
                $staffWorkplaces=DB::table('staff_workplaces')
                    ->join('gn_divisions','staff_workplaces.place_id','gn_divisions.gn_id')
                    ->get();
                
            }
        }
        return view('staff.show',compact('staffWorkplaces','staffId','staff'));
    }
    function edit($staff){
        $staff=Staff::find($staff);
        return view('staff.edit',compact('staff'));
    }
    function update(Request $req,$staff){
        $staff= Staff::find($staff);
        $staff->first_name=$req->fname;
        $staff->last_name=$req->lname;
        $staff->nic=$req->nic;
        $staff->dob=$req->dob;
        $staff->gender=$req->gender;
        $staff->mobile=$req->mobile;
        $staff->address=$req->address;
        $staff->save();
        return redirect()->route('staff.index');
    }
    function destroy($staff){
        $staff=User::where('user_id',$staff)->first();
        $staff->status='inactive';
        $staff->save();
        // Update End date when deleteing staff
        $staffWorkplace=DB::table('staff_workplaces')
        ->where('staff_id',$staff)
        ->where('end_date',null)
        ->update(['end_date'=>Carbon::now()]);
        return redirect()->back();
    }
    function loadDesignation($designation){
        // return $designation;
        if($designation=="DS"){
            $workPlaces=Division::pluck('name');
            foreach($workPlaces as $workplace){
                echo '<option>'.$workplace.'</option>';
            }
        }
        else{
            $workPlaces=GNDivision::pluck('name');
            foreach($workPlaces as $workplace){
                echo '<option>'.$workplace.'</option>';
            }
        }

    }
}