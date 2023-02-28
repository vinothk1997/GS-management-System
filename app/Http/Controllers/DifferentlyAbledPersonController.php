<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DifferentlyAbledPerson;

class DifferentlyAbledPersonController extends Controller
{
    public function index(){
        $differentlyAbledPersons=DifferentlyAbledPerson::all();
        return view('differentlyAbledPerson.index',compact('differentlyAbledPersons'));

    }
    public function create(){
        return view('differentlyAbledPerson.create');

    }
    public function store(Request $req){
        $differentlyAbledPerson=new DifferentlyAbledPerson;
        $differentlyAbledPerson->type=$req->type;
        $differentlyAbledPerson->date=$req->date;
        $differentlyAbledPerson->reason=$req->reason;
        $differentlyAbledPerson->monthly_assist=$req->monthly_assist;
        $differentlyAbledPerson->amount=$req->amount;
        $differentlyAbledPerson->family_id=$req->family_id;
        $differentlyAbledPerson->member_id=$req->member_id;
        $differentlyAbledPerson->save();
        return redirect()->route('differentlyAbledPerson.index');

    }
    public function edit(Request $req){
        $differentlyAbledPerson=DifferentlyAbledPerson::find($req->id);
        return view('differentlyAbledPerson.edit',compact('differentlyAbledPerson'));
    }
    public function update(Request $req){
        $differentlyAbledPerson=DifferentlyAbledPerson::find($req->id);
        $differentlyAbledPerson->type=$req->type;
        $differentlyAbledPerson->date=$req->date;
        $differentlyAbledPerson->reason=$req->reason;
        $differentlyAbledPerson->monthly_assist=$req->monthly_assist;
        $differentlyAbledPerson->amount=$req->amount;
        $differentlyAbledPerson->save();
        return redirect()->route('differentlyAbledPerson.index');


    }
    public function confirmDelete(){

    }
    public function destroy(Request $req){
        DifferentlyAbledPerson::destroy($req->id);
        return redirect()->route('differentlyAbledPerson.index');
    }
    
}