<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEducationRequest;
use App\Models\Education;

class EducationController extends Controller
{
    function index(){
        $educations=Education::all();
        return view('education.index',compact('educations'));
    }
    function create(){
        return view('education.create');
    }
    function store(StoreEducationRequest $req){
        $lastEducationId=Education::pluck('education_id')->last();
        if(!$lastEducationId){
            $educationId="ED001";
        }
        else{
            $educationId=++$lastEducationId;
        }
        $education = new Education;
        $education->education_id=$educationId;
        $education->name=$req->name;
        $education->save();
        return redirect()->back()->with(['msg'=>'added succesfully']);
    }
    function show(){
        return;
    }
    function edit($education){
        $education=Education::find($education);
        return view('education.edit',compact('education'));
    }
    function update(StoreEducationRequest $req,$education){
        $education= Education::find($education);
        $education->name=$req->name;
        $education->save();
        return redirect()->route('education.index')->with(['msg'=>'Updated succesfully']);
    }
    function destroy($education){
        Education::destroy($education);
        return redirect()->back();
    }
}