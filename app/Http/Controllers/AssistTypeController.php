<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssistTypeRequest;
use App\Models\AssistType;

class AssistTypeController extends Controller
{
    function index(){
        $assistTypes=AssistType::all();
        return view('assist-type.index',compact('assistTypes'));
    }
    function create(){

        return view('assist-type.create');
    }
    function store(StoreAssistTypeRequest $req){
        
        $lastAssistTypeId=AssistType::pluck('assist_type_id')->last();
        if(!$lastAssistTypeId){
            $assistTypeId="AT01";
        }
        else{
            $assistTypeId=++$lastAssistTypeId;
        }
        $assistType = new AssistType;
        $assistType->assist_type_id=$assistTypeId;
        $assistType->name=$req->name;
        $assistType->save();
        return redirect()->back()->with(['msg'=>'Added succesfully']);
    }

    function edit($assist){
        $assistType=AssistType::find($assist);
        return view('assist-type.edit',compact('assistType'));
    }
    function update(StoreAssistTypeRequest $req,$assist){
        $assist= AssistType::find($assist);
        $assist->name=$req->name;
        $assist->save();
        return redirect()->route('assistType.index')->with(['msg'=>'Updated succesfully']);
    }
    function destroy($assist){
        $assist= AssistType::destroy($assist);
        return redirect()->route('assistType.index')->with(['msg'=>'Deleted succesfully']);
    }
}