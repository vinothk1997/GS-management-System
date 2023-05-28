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
        $tree=Tree::where('land_id',$req->land_id)
        ->where('tree_name',$req->tree_name)
        ->first();
        return view('tree.edit',compact('tree'));
    }
    public function update(Request $req)
    {
        $tree=DB::table('trees')->where('land_id',$req->land_id)
        ->where('tree_name',$req->tree_name)
        ->update([
            'tree_name'=>$req->tree_name,
            'tree_type'=>$req->tree_type,
            'no_of_tree'=>$req->no_of_tree
        ]);
        return redirect()->route('tree.index');
    }
    public function confirmDelete()
    {

    }
    public function destroy(Request $req)
    {
     
        Tree::where('land_id',$req->land_id)
        ->where('tree_name',$req->tree_name)->delete();
        return redirect()->route('tree.index');
    }
    
}