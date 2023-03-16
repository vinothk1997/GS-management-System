<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Models\StaffWorkplace;
use App\Models\User;
use DB;

class StaffController extends Controller
{
    function index(){
        $staffs=Staff::all();
        return view('staff.index',compact('staffs'));
    }
    function create(){
        return view('staff.create');
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
        // Insert user table
        $user=new User;
        $user->user_id=$StaffId;
        $user->name=$req->nic;
        $user->password=Hash::make($req->nic);
        $user->attempt='0';
        $user->status='active';
        $user->save();
        return redirect()->back();
    }
    function show($staff){
        $staffId=$staff;
        $staffWorkplaces=StaffWorkplace::where('staff_id',$staff)->get();
        return view('staff.show',compact('staffWorkplaces','staffId'));
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
        Staff::destroy($staff);
        return redirect()->back();
    }
}