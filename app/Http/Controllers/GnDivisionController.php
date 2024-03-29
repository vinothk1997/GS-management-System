<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGNDivisionRequest;
use App\Models\GnDivision;
use App\Models\Division;
use DB;

class GnDivisionController extends Controller
{
    function index(){
        $gns=DB::table('gn_divisions')
        ->join('divisions','gn_divisions.division_id','divisions.division_id')
        ->select('gn_divisions.gn_id','gn_divisions.name','gn_divisions.code','divisions.name as division')
        ->get();
        return view('gn-division.index',compact('gns'));
    }
    function create($divisionId){
        $divisionId=$divisionId;
        return view('gn-division.create',compact('divisionId'));
    }
    function store(StoreGNDivisionRequest $req){
        // return $req;
        $lastGnId=GnDivision::pluck('gn_id')->last();
        if(!$lastGnId){
            $gnId="GN001";
        }
        else{
            $gnId=++$lastGnId;
        }
        $gn = new GnDivision;
        $gn->gn_id=$gnId;
        $gn->name=$req->name;
        $gn->code=$req->code;
        $gn->division_id=$req->divisionId;
        $gn->save();
        return redirect()->back()->with(['msg'=>'Added succesfully']);
    }
    function show(){
        return view('district.index');
    }
    function edit($gn){
        $divisions=Division::pluck('name');
        $gn=DB::table('gn_divisions')
        ->join('divisions','gn_divisions.division_id','=','divisions.division_id')
        ->where('gn_id',$gn)
        ->select('gn_divisions.gn_id','gn_divisions.name','gn_divisions.code','divisions.name as division')
        ->get()[0];
        // return $gn;
        
        return view('gn-division.edit',compact('gn','divisions'));
    }
    function update(Request $req,$gn){
        $gn= GnDivision::find($gn);
        $gn->name=$req->name;
        $gn->code=$req->code;
        $gn->save();
        return redirect()->to('divisions/'.$gn->division_id.'/show')->with(['msg'=>'Updated succesfully']);
    }
    function destroy($gn){
        $gn= GnDivision::find($gn);
        $gn->delete();
        return redirect()->to('divisions/'.$gn->division_id.'/show')->with(['msg'=>'Deleted succesfully']);
    }
}