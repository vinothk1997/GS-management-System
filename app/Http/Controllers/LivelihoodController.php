<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livelihood;
use App\Models\AssistType;
use App\Http\Requests\StoreLivelihoodRequest;
use Carbon\Carbon;

class LivelihoodController extends Controller
{
    function index(){
        $livelihoods=Livelihood::all();
        return view('livelihood.index',compact('livelihoods'));
    }

    function indexByFamilyHead(Request $req)
    {
        $family_id=$req->family_id;
        $livelihoods=Livelihood::where('family_id',$family_id)->get();
        return view('livelihood.familyHead-index',compact('livelihoods','family_id'));
    }

    function create(Request $req){
        $family_id=$req->family_id;
        $livelihoods=Livelihood::where('family_id',$family_id)->get();
        $assistTypes=AssistType::all();
        return view('livelihood.create',compact('assistTypes','livelihoods','family_id'));

    }

    function store(StoreLivelihoodRequest $req){
        $family_id=$req->family_id;
        $lastLivelihoodId=Livelihood::pluck('livelihood_id')->last();
        if(!$lastLivelihoodId){
            $livelihoodId="LH00000001";
        }
        else{
            $livelihoodId=++$lastLivelihoodId;
        }
        
        $livelihoodCheck=Livelihood::where('assist_type_id',$req->assist_type_id)
        ->where('family_id',$family_id)->get();
        if($livelihoodCheck->isNotEmpty()){
            if($livelihoodCheck->where('end_date',null)){
                if($livelihoodCheck[0]->start_date===Carbon::today()->format('Y-m-d')){
                    $livelihoodCheck[0]->delete();
                    $obj=new Livelihood;
                    $obj->livelihood_id=$livelihoodId;
                    $obj->start_date=$req->start_date;
                    $obj->end_date=null;
                    $obj->amount=$req->amount;
                    $obj->assist_type_id=$req->assist_type_id;
                    $obj->family_id=$req->family_id;
                    $obj->save();
                    return redirect()->back();
                }
                else{
                    $livelihoodCheck->where('end_date',null)
                    ->first()
                    ->update(['end_date'=>Carbon::yesterday()]);
                    $obj=new Livelihood;
                    $obj->livelihood_id=$livelihoodId;
                    $obj->start_date=$req->start_date;
                    $obj->end_date=null;
                    $obj->amount=$req->amount;
                    $obj->assist_type_id=$req->assist_type_id;
                    $obj->family_id=$req->family_id;
                    $obj->save();
                    return redirect()->back();
                }
            }
            else{
                $obj=new Livelihood;
                $obj->livelihood_id=$livelihoodId;
                $obj->start_date=$req->start_date;
                $obj->end_date=null;
                $obj->amount=$req->amount;
                $obj->assist_type_id=$req->assist_type_id;
                $obj->family_id=$req->family_id;
                $obj->save();
                return redirect()->back();
            }
        }
        else{
            $obj=new Livelihood;
            $obj->livelihood_id=$livelihoodId;
            $obj->start_date=$req->start_date;
            $obj->end_date=null;
            $obj->amount=$req->amount;
            $obj->assist_type_id=$req->assist_type_id;
            $obj->family_id=$req->family_id;
            $obj->save();
            return redirect()->back();
        }

    }        

    function edit(Request $req){
        $assistTypes=AssistType::all();
        $livelihood=Livelihood::find($req->livelihood_id);
        $assistType=AssistType::where('assist_type_id',$livelihood->assist_type_id)->pluck('name')->first();
        $livelihood->setAttribute('assist_type',$assistType);

        return view('livelihood.edit',compact('livelihood','assistTypes'));

    }
    function update(Request $req){
        $livelihood=Livelihood::find($req->livelihood_id);
        $livelihood->start_date=$req->start_date;
        $livelihood->amount=$req->amount;
        $livelihood->start_date=$req->start_date;
        $livelihood->assist_type_id=$assistTypeId;
        $livelihood->save();
        return redirect()->route('livelihood.index');
    }
    function destroy(Request $req){
        Livelihood::where('family_id',$req->family_id)
        ->where('assist_type_id',$req->id)
        ->delete();
    }
}