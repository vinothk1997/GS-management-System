<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffWorkplace;
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
    function store(Request $req){
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