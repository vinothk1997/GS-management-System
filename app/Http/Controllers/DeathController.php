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
    public function create($id){
        $member_id=urldecode($id);
        return view('death.create',compact('member_id'));

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
        $member_id=$req->member_id;
        $death=Death::find($req->death_id);
        return view('death.edit',compact('death','member_id'));

    }
    public function update(Request $req){
        $death=Death::find($req->death_id);
        $death->death_date=$req->death_date;
        $death->place=$req->place;
        $death->reason=$req->reason;
        $death->save();
        return redirect()->back();

    }

    public function destroy(Request $req){
        Death::destroy($req->death_id);
        return redirect()->back();
    }
    
}