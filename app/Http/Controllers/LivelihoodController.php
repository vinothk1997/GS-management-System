<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livelihood;
use App\Models\AssistType;

class LivelihoodController extends Controller
{
    function index(){
        $livelihoods=Livelihood::all();
        return view('livelihood.index',compact('livelihoods'));
    }
    function create(){
        $assistTypes=AssistType::pluck('name');
        return view('livelihood.create',compact('assistTypes'));

    }
    function store(Request $req){
        $assistTypeId=AssistType::where('name',$req->assist_type)->pluck('assist_type_id')->first();
        $lastLivelihoodId=Livelihood::pluck('livelihood_id')->last();
        if(!$lastLivelihoodId){
            $livelihoodId="LH00000001";
        }
        else{
            $livelihoodId=++$lastLivelihoodId;
        }
        $livelihood=new Livelihood;
        $livelihood->livelihood_id=$livelihoodId;
        $livelihood->start_date=$req->start_date;
        $livelihood->amount=$req->amount;
        $livelihood->assist_type_id=$assistTypeId;
        $livelihood->family_id=$req->family_id;
        $livelihood->save();

    }
    function edit(Request $req){
        $assistTypes=AssistType::pluck('name');
        $livelihood=Livelihood::find($req->livelihood_id);
        $assistType=AssistType::where('assist_type_id',$livelihood->assist_type_id)->pluck('name')->first();
        $livelihood->setAttribute('assist_type',$assistType);

        return view('livelihood.edit',compact('livelihood','assistTypes'));

    }
    function update(Request $req){
        $assistTypeId=AssistType::where('name',$req->assist_type)->pluck('assist_type_id')->first();
        $livelihood=Livelihood::find($req->livelihood_id);
        $livelihood->start_date=$req->start_date;
        $livelihood->amount=$req->amount;
        $livelihood->start_date=$req->start_date;
        $livelihood->assist_type_id=$assistTypeId;
        $livelihood->save();
        return redirect()->route('livelihood.index');
    }
    function destroy(Request $req){
        Livelihood::destroy($req->livelihood_id);
        return redirect()->route('livelihood.index');
    }
}