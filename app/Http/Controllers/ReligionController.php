<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReligionRequest;

use App\Models\Religion;

class ReligionController extends Controller
{
    function index(){
        $religions=Religion::all();
        return view('religion.index',compact('religions'));
    }
    function create(){
        return view('religion.create');
    }
    function store(StoreReligionRequest $req){
        // return $req;
        $lastReligionId=Religion::pluck('religion_id')->last();
        if(!$lastReligionId){
            $religionId="RG01";
        }
        else{
            $religionId=++$lastReligionId;
        }
        $religion = new Religion;
        $religion->religion_id=$religionId;
        $religion->name=$req->name;
        $religion->save();
        return redirect()->back()->with(['msg'=>'added succesfully']);
    }
    function show(){
        return;
    }
    function edit($religion){
        $religion=Religion::find($religion);
        return view('religion.edit',compact('religion'));
    }
    function update(StoreReligionRequest $req,$religion){
        $religion= Religion::find($religion);
        $religion->name=$req->name;
        $religion->save();
        return redirect()->route('religion.index')->with(['msg'=>'Updated succesfully']);
    }
    function destroy($religion){
        Religion::destroy($religion);
        return redirect()->back();
    }
}