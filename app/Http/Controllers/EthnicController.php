<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEthnicRequest;
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
    function store(StoreEthnicRequest $req){
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
        return redirect()->back()->with(['msg'=>'Added succesfully']);
    }
    function show(){
        return;
    }
    function edit($ethnic){
        $ethnic=Ethnic::find($ethnic);
        return view('ethnic.edit',compact('ethnic'));
    }
    function update(StoreEthnicRequest $req,$ethnic){
        $ethnic= Ethnic::find($ethnic);
        $ethnic->name=$req->name;
        $ethnic->save();
        return redirect()->route('ethnic.index')->with(['msg'=>'Updated succesfully']);
    }
    function destroy($ethnic){
        Ethnic::destroy($ethnic);
        return redirect()->back();
    }
}