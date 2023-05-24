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
    // this working as create and edit
    function create(Request $req){
        $family_id=$req->family_id;
        $infrastructure=Infrastructure::where('family_id',$family_id)->first();
        if($infrastructure!=null){
            return view('infrastructure.edit',compact('infrastructure','family_id'));
        }
        else{
            return view('infrastructure.create',compact('family_id'));
        }
    }
    function store(Request $req){
        $infrastructure= $infrastructure=Infrastructure::find($req->familyId);
        if($infrastructure==null){
            $infrastructure=new Infrastructure;
        }
        $infrastructure->family_id=$req->familyId;
        $infrastructure->type_of_residence=$req->type_of_residence;
        $infrastructure->type_of_house=$req->type_of_house;
        $infrastructure->roof=$req->type_of_roof;
        $infrastructure->lightning=$req->lightning;
        $infrastructure->water_facility=$req->water_facility;
        $infrastructure->sanitary_facility=$req->sanitary_facility;
        $infrastructure->save();
        return redirect()->route('familyHead.show')
                     ->with('familyId', $req->input('familyId'));
    }
    
    function show(){
        return view('district.index');
    }

    function destroy(Request $req){
        $gn= Infrastructure::destroy($req->familyId);
        return redirect()->route('infrastructure.index');
    }
}