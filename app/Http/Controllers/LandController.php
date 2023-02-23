<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;

class LandController extends Controller
{
    function index(){
        $lands=Land::all();
        return view('land.index',compact('lands'));

    }
    function create(){
        return view('land.create');

    }
    function store(Request $req){
        $lastLandId=Land::pluck('land_id')->last();
        if(!$lastLandId){
            $landId="LN00000001";
        }
        else{
            $landId=++$lastLandId;
        }
        $land=new Land;
        $land->land_id=$landId;
        $land->family_id=$req->family_id;
        $land->member_id=$req->member_id;
        $land->land_type=$req->land_type;
        $land->land_gn_id=$req->land_gn_id;
        $land->address=$req->address;
        $land->area=$req->area;
        $land->reg_no=$req->reg_no;
        $land->save();
        return redirect()->back();

    }
    function edit(Request $req){
        $land=Land::find($req->land_id);
        return view('land.edit',compact('land'));

    }
    function update(Request $req){
        // return $req;
        $land=Land::find($req->land_id);
        $land->family_id=$req->family_id;
        $land->member_id=$req->member_id;
        $land->land_type=$req->land_type;
        $land->land_gn_id=$req->land_gn_id;
        $land->address=$req->address;
        $land->area=$req->area;
        $land->reg_no=$req->reg_no;
        $land->save();
        return redirect()->route('land.index');
    }

    function confirmDelete(){
        
    }
    function destroy(Request $req){
        Land::destroy($req->land_id);
        return redirect()->route('land.index');
        
    }
}