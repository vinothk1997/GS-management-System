<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ethnic;

class EthnicController extends Controller
{
    function index(){
        $ethnics=Ethnic::all();
        return view('ethnic.index',compact('ethnics'));
    }
    function create(){
        return view('ethnic.create');
    }
    function store(Request $req){
        $lastEthnicId=Ethnic::pluck('ethnic_id')->last();
        if(!$lastEthnicId){
            $ethnicId="ET01";
        }
        else{
            $ethnicId=++$lastEthnicId;
        }
        $ethnic = new Ethnic;
        $ethnic->ethnic_id=$ethnicId;
        $ethnic->name=$req->name;
        $ethnic->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($ethnic){
        $ethnic=Ethnic::find($ethnic);
        return view('ethnic.edit',compact('ethnic'));
    }
    function update(Request $req,$ethnic){
        $ethnic= Ethnic::find($ethnic);
        $ethnic->name=$req->name;
        $ethnic->save();
        return redirect()->route('ethnic.index');
    }
    function destroy($ethnic){
        Ethnic::destroy($ethnic);
        return redirect()->back();
    }
}