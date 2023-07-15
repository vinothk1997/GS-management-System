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
        return redirect()->back()->with(['msg'=>'Added succesfully']);
    }
    function show($division){
        $divisionId=$division;
        $gns=GnDivision::where('division_id',$division)->get();
        $district_id=Division::where('division_id',$division)->first()->district_id;
        return view('division.show',compact('gns','divisionId','district_id'));
    }
    function edit($division){
        $districts=District::pluck('name');
        $division=DB::table('divisions')
        ->join('districts','divisions.district_id','districts.district_id')
        ->select('divisions.division_id','divisions.name','districts.name as district')
        ->get()[0];
        return view('division.edit',compact('division','districts'));
    }
    function update(StoreDivisionRequest $req,$division){
  
        $division= Division::find($division);
        $division->name=$req->name;
        $division->save();
        return redirect()->to('districts/'.$division->district_id.'/show')->with(['msg'=>'Updated succesfully']);
    }

    function destroy($division){
        Division::destroy($division);
        return redirect()->back()->with(['msg'=>'Deleted succesfully']);
    }
}