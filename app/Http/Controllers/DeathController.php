<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Death;

class DeathController extends Controller
{
    public function index(){
        $deaths=Death::all();
        return view('death.index',compact('deaths'));
    }
    public function create(){
        return view('death.create');

    }
    public function store(Request $req ){
        $death=new Death;
        $death->member_id=$req->member_id;
        $death->member_id=$req->member_id;
        $death->death_date=$req->death_date;
        $death->place=$req->place;
        $death->reason=$req->reason;
        $death->save();
        return redirect()->back();

    }
    public function edit(Request $req){
        $death=Death::find($req->death_id);
        return view('death.edit',compact('death'));

    }
    public function update(Request $req){
        $death=Death::find($req->death_id);
        $death->death_date=$req->death_date;
        $death->place=$req->place;
        $death->reason=$req->reason;
        $death->save();
        return redirect()->route('death.index');

    }

    public function destroy(Request $req){
        Death::destroy($req->death_id);
        return redirect()->route('death.index');

    }
    
}