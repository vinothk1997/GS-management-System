<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pension;
use App\Http\Requests\StorePensionRequest;

class PensionController extends Controller
{
  
    public $banks=['Bank of ceylon','Peoples bank','HNB','Commercial'];

    public function index(){
        $pensions=Pension::all();
        // return $pensions;
        return view('pension.index',compact('pensions'));
    }
    public function create($id){
        $member_id=$id;
        $banks=$this->banks;
        return view('pension.create',compact('banks','member_id'));

    }
    public function store(StorePensionRequest $req){
        $pension = new Pension;
        $pension->pension_no=$req->pension_no;
        $pension->bank=$req->bank;
        $pension->amount=$req->amount;
        $pension->category=$req->category;
        $pension->family_id=$req->family_id;
        $pension->member_id=$req->member_id;
        $pension->save();
        return redirect()->back();

    }
    public function edit(Request $req){
        $pension=Pension::find($req->pension_id);
        $member_id=$req->member_id;
        $banks=$this->banks;
        return view('pension.edit',compact('pension','banks','member_id'));

    }
    public function update(Request $req){
        $pension=Pension::find($req->pension_id);
        $pension->pension_no=$req->pension_no;
        $pension->bank=$req->bank;
        $pension->amount=$req->amount;
        $pension->category=$req->category;
        $pension->save();
        return redirect()->to('/family-Members/show?memberId='.$req->member_id);

    }

    public function confirmDelete(){

    }

    public function destroy(Request $req){
        Pension::destroy($req->pension_id);
        return redirect()->to('/family-Members/show?memberId='.$req->member_id);
        
    }
}