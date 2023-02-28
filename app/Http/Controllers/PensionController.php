<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pension;

class PensionController extends Controller
{
  
    public $banks=['Bank of ceylon','Peoples bank'];

    public function index(){
        $pensions=Pension::all();
        // return $pensions;
        return view('pension.index',compact('pensions'));
    }
    public function create(){
        $categories=$this->categories;
        return view('pension.create',compact('categories'));

    }
    public function store(Request $req){
        $pension = new Pension;
        $pension->pension_no=$req->pension_no;
        $pension->bank=$req->bank;
        $pension->amount=$req->amount;
        $pension->category=$req->category;
        $pension->family_id=$req->family_id;
        $pension->member_id=$req->member_id;
        $pension->save();
        return redirect()->route('pension.index');

    }
    public function edit(Request $req){
        $pension=Pension::find($req->pension_id);
        $banks=$this->banks;
        return view('pension.edit',compact('pension','banks'));

    }
    public function update(Request $req){
        $pension=Pension::find($req->pension_id);
        $pension->pension_no=$req->pension_no;
        $pension->bank=$req->bank;
        $pension->amount=$req->amount;
        $pension->category=$req->category;
        $pension->save();
        return redirect()->route('pension.index');

    }
    public function confirmDelete(){

    }
    public function destroy(Request $req){
        Pension::destroy($req->pension_id);
        return redirect()->route('pension.index');
        
    }
}