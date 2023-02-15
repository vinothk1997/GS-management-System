<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStaffWorkplaceRequest;
use App\Models\Staff;
use App\Models\StaffWorkplace;

class StaffWorkplaceController extends Controller
{
    function index(){
        $staffWorkplaces=StaffWorkplace::all();
        return view('staff-workplace.index',compact('staffWorkplaces'));
    }
    
    function create($staffworkplace){
        // $staffNICs=Staff::pluck('nic');
        $staffId=$staffworkplace;
        return view('staff-workplace.create',compact('staffId'));
    }
    
    function store(StoreStaffWorkplaceRequest $req){
        $staffWorkplace = new StaffWorkplace;
        $staffWorkplace->staff_id=$req->staffId;
        $staffWorkplace->start_date=$req->startDate;
        $staffWorkplace->end_date=$req->endDate;
        $staffWorkplace->designation=$req->designation;
        $staffWorkplace->place_id=$req->placeId;
        $staffWorkplace->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($staffworkplace,$startDate){
        $staffWorkplace=StaffWorkplace::where('staff_id',$staffworkplace)
        ->where('start_date',$startDate)
        ->first();
        // return $staffWorkplace;
        return view('staff-workplace.edit',compact('staffWorkplace'));
    }
    function update(Request $req,$staffworkplace,$startDate){
        $staffWorkplace=StaffWorkplace::where('staff_id',$staffworkplace)->where('start_date',$startDate)
        ->update([
            'start_date'=>$req->startDate,
            'end_date'=>$req->endDate,
            'designation'=>$req->designation,
            'place_id'=>$req->placeId,
        ]);
        return redirect()->route('staffWorkplace.index');
    }
    function destroy($staffworkplace,$startDate){
        StaffWorkplace::where('staff_id',$staffworkplace)->where('start_date',$startDate)->delete();
        return redirect()->back();
    }
}