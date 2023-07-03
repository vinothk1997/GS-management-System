<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\Tree;
use App\Models\GnDivision;

use Illuminate\Support\Facades\Storage;

class LandController extends Controller
{
    function index(){
        $lands=Land::all();
        return view('land.index',compact('lands'));

    }
    function create($id){
        $member_id=$id;
        $gns=GnDivision::all();
        return view('land.create',compact('member_id','gns'));

    }
    function store(Request $req){
        $lastLandId=Land::pluck('land_id')->last();
        if(!$lastLandId){
            $landId="LN00000001";
        }
        else{
            $landId=++$lastLandId;
        }
        $land=new Land;
        $land->land_id=$landId;
        $land->family_id=$req->family_id;
        $land->member_id=$req->member_id;
        $land->land_type=$req->land_type;
        $land->land_gn_id=$req->land_gn_id;
        $land->address=$req->address;
        $land->area=$req->area;
        $land->reg_no=$req->reg_no;
        $land->document_file= self::fileUpload($req,$landId);
        $land->save();
        return redirect()->back();

    }

    public static function fileUpload($req,$landId){
        $file=$req->file('document');
        $path = $file->storeAs('lands', $landId.'.'.$file->getClientOriginalExtension(),'public');
        return $path;

    }

    function edit(Request $req){
        $land=Land::find($req->id);
        $gns=GnDivision::all();
        return view('land.edit',compact('land','gns'));

    }

    function update(Request $req){
        // return $req;
        $land=Land::find($req->land_id);
        $land->family_id=$req->family_id;
        $land->member_id=$req->member_id;
        $land->land_type=$req->land_type;
        $land->land_gn_id=$req->land_gn_id;
        $land->address=$req->address;
        $land->area=$req->area;
        $land->reg_no=$req->reg_no;
        // $land->document_file= self::fileUpload($req);
        $land->save();
        return redirect()->to('/family-Members/show?memberId='.$req->member_id);
    }

    public function show(Request $req){
        $land=Land::where('land_id',$req->land_id)->first();
        $trees=Tree::where('land_id',$req->land_id)->get();
        return view('land.show',compact('trees','land'),[
            'member_id'=>$req->member_id,
            'land_id'=>$req->land_id
        ]);
    }

    function confirmDelete(){
        
    }

    function destroy(Request $req){
        Land::destroy($req->id);
        return redirect()->to('/family-Members/show?memberId='.$req->member_id);
        
    }
}