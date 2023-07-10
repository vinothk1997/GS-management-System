<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tree;
use App\Models\Land;
use DB;

class TreeController extends Controller
{
    public function index()
    {
        $trees=Tree::all();
        return view('tree.index',compact('trees'));

    }
    public function create($id)
    {
        return view('tree.create',['land_id'=>$id]);

    }
    public function store(Request $req)
    {
        $tree=new Tree;
        $tree->land_id=$req->land_id;
        $tree->tree_name=$req->tree_name;
        $tree->tree_type=$req->tree_type;
        $tree->no_of_tree=$req->no_of_tree;
        $tree->save();
        return redirect()->back();
    }
    public function edit(Request $req)
    {
        // return $req;
        $tree=Tree::where('land_id',$req->land_id)
        ->where('tree_name',$req->tree_name)
        ->first();
        // return $tree;
        return view('tree.edit',compact('tree'));
    }
    public function update(Request $req)
    {
        $trees=Tree::where('land_id',$req->land_id)
        ->where('tree_name',$req->old_tree_name)
        ->update([
            'tree_name'=>$req->tree_name,
            'tree_type'=>$req->tree_type,
            'no_of_tree'=>$req->no_of_tree
        ]);
        $land=Land::where('land_id',$req->land_id)->first();
        $member_id=$land->member_id;
        $land_id=$req->land_id;
        $trees=Tree::where('land_id',$req->land_id)->get(); 
        return view('land.show',compact('trees','land'),[
            'member_id'=>$member_id,
            'land_id'=>$land_id
        ]);
    }

    public function confirmDelete()
    {

    }

    public function destroy(Request $req)
    {
     
        Tree::where('land_id',$req->land_id)
        ->where('tree_name',$req->tree_name)->delete();
           $member_id=Land::where('land_id',$req->land_id)->first()->member_id;

            $land_id=$req->land_id;
            $trees=Tree::where('land_id',$req->land_id)->get(); 
            return view('land.show',compact('trees'),[
                'member_id'=>$member_id,
                'land_id'=>$land_id
            ]);
    }
    
}