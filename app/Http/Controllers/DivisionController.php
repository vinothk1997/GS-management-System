<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDivisionRequest;
use App\Models\Division;
use App\Models\District;
use App\Models\GnDivision;;
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
    function create($districtId){
        $districtId=$districtId;
        return view('division.create',compact('districtId'));

    }
    function store(StoreDivisionRequest $req){
        // return $req;
        $lastDivisionId=Division::pluck('division_id')->last();
        if(!$lastDivisionId){
            $divisionId="DV001";
        }
        else{
            $divisionId=++$lastDivisionId;
        }
        $division = new Division;
        $division->division_id=$divisionId;
        $division->name=$req->name;
        $division->district_id=$req->districtId;
        $division->save();
        return redirect()->back();
    }
    function show($division){
        $divisionId=$division;
        $gns=GnDivision::where('division_id',$division)->get();
        // return $gns; 
        return view('division.show',compact('gns','divisionId'));
    }
    function edit($division){
        $districts=District::pluck('name');
        $division=DB::table('divisions')
        ->join('districts','divisions.district_id','districts.district_id')
        ->select('divisions.division_id','divisions.name','districts.name as district')
        ->get()[0];
        // return $division;
        return view('division.edit',compact('division','districts'));
    }
    function update(Request $req,$division){
        $districtId=District::where('name',$req->district)->pluck('district_id')[0];
        $division= Division::find($division);
        $division->name=$req->name;
        $division->district_id=$districtId;
        $division->save();
        return redirect()->route('division.index');
    }
    function destroy($division){
        Division::destroy($division);
        return redirect()->back();
    }
}