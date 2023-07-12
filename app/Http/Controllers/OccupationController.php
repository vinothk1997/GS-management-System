<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOccupationRequest;
use App\Models\Occupation;

class OccupationController extends Controller
{
    function index(){
        $occupations=Occupation::all();
        return view('occupation.index',compact('occupations'));
    }
    function create(){
        return view('occupation.create');
    }
    function store(StoreOccupationRequest $req){
        $lastOccupationId=Occupation::pluck('occupation_id')->last();
        if(!$lastOccupationId){
            $occupationId="OC001";
        }
        else{
            $occupationId=++$lastOccupationId;
        }
        $occupation = new Occupation;
        $occupation->occupation_id=$occupationId;
        $occupation->name=$req->name;
        $occupation->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($occupation){
        $occupation=Occupation::find($occupation);
        return view('occupation.edit',compact('occupation'));
    }
    function update(StoreOccupationRequest $req,$occupation){
        $occupation= Occupation::find($occupation);
        $occupation->name=$req->name;
        $occupation->save();
        return redirect()->route('occupation.index');
    }
    function destroy($occupation){
        Occupation::destroy($occupation);
        return redirect()->back();
    }
}