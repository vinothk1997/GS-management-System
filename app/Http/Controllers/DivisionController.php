<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use DB;

class DivisionController extends Controller
{
    function index(){
        $divisions=DB::table('divisions')
        ->join('districts','divisions.district_id','=','districts.district_id')
        ->select('divisions.division_id','divisions.name','districts.name as district')
        ->get();
        return view('division.index',compact('divisions'));
    }
    function create(){
        $districts=District::pluck('name');
        return view('division.create',compact('districts'));

    }
    function store(Request $req){
        // return $req;
        $district=District::where('name',$req->district)->select('district_id')->get();
        $lastDivisionId=Division::pluck('division_id')->last();
        if(!$lastDivisionId){
            $divisionId="ST001";
        }
        else{
            $divisionId=++$lastDivisionId;
        }
        $division = new Division;
        $division->division_id=$divisionId;
        $division->name=$req->name;
        $division->district_id=$district[0]->district_id;;
        $division->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($staff){
        $division=Division::find($division);
        return view('division.edit',compact('division'));
    }
    function update(Request $req,$staff){
        $staff= Division::find($staff);
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
        Division::destroy($staff);
        return redirect()->back();
    }
}