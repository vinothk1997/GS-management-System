<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infrastructure;

class InfrastructureController extends Controller
{
    function index(){
        $infrastructures=Infrastructure::all();
        return view('infrastructure.index',compact('infrastructures'));
    }
    function create(){
        return view('infrastructure.create');
    }
    function store(Request $req){
        $infrastructure=new Infrastructure;
        $infrastructure->family_id=$req->familyId;
        $infrastructure->type_of_residence=$req->type_of_residence;
        $infrastructure->type_of_house=$req->type_of_house;
        $infrastructure->roof=$req->type_of_roof;
        $infrastructure->lightning=$req->lightning;
        $infrastructure->water_facility=$req->water_facility;
        $infrastructure->sanitary_facility=$req->sanitary_facility;
        $infrastructure->save();
        return redirect()->back();
    }
    function show(){
        return view('district.index');
    }
    function edit(Request $req){
        $infrastructure=Infrastructure::where('family_id',$req->familyId)->first();
        // return $infrastructure;
        return view('infrastructure.edit',compact('infrastructure'));
    }
    function update(Request $req){
        $infrastructure=Infrastructure::find($req->familyId);
        $infrastructure->type_of_residence=$req->type_of_residence;
        $infrastructure->type_of_house=$req->type_of_house;
        $infrastructure->roof=$req->type_of_roof;
        $infrastructure->lightning=$req->lightning;
        $infrastructure->water_facility=$req->water_facility;
        $infrastructure->sanitary_facility=$req->sanitary_facility;
        $infrastructure->save();
        return redirect()->route('infrastructure.index');
    }
    function destroy(Request $req){
        $gn= Infrastructure::destroy($req->familyId);
        return redirect()->route('infrastructure.index');
    }
}