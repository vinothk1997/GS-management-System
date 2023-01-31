<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffWorkplace;

class StaffWorkplaceController extends Controller
{
    function index(){
      
        $staffworkplaces=StaffWorkplace::all();
        return view('staff-workplace.index',compact('staffworkplaces'));
    }
    function create(){
        $staffNICs=Staff::pluck('nic');
        return view('staff-workplace.create',compact('staffNICs'));
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
    function show(){
        return;
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