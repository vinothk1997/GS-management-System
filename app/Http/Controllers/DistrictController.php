<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDistrictRequest;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    function index(){
        $districts=District::all();
        // return $districts;
        return view('district.index',compact('districts'));
    }

    function create(){
        return view('district.create');
    }

    function store(StoreDistrictRequest $req){

        $lastDistrict=District::pluck('district_id')->last();
        if(!$lastDistrict){
            $districtId="DS01";
        }
        else{
            $districtId=++$lastDistrict;
        }
        $district = new District;
        $district->district_id=$districtId;
        $district->name=$req->name;
        $district->save();
        return redirect()->back();
    }
    function show($district){
        $districtId=$district;
        $divisions=Division::where('district_id',$district)->get();
        // return $divisions;
        return view('district.show',compact('divisions','districtId'));
    }
    function edit($district){
        $district=District::find($district);
        return view('district.edit',compact('district'));
    }
    function update(StoreDistrictRequest $req,$district){
        $district= District::find($district);
        $district->name=$req->name;
        $district->save();
        return redirect()->route('district.index');
    }
    function destroy($district){
        District::destroy($district);
        return redirect()->back();
    }
}