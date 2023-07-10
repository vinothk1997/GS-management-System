<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStaffWorkplaceRequest;
use App\Models\Staff;
use App\Models\StaffWorkplace;
use App\Models\Division;
use App\Models\GNDivision;
use Carbon\Carbon;
use DB;
use app\Http\Requests\StaffWorkplaceRequest;
class StaffWorkplaceController extends Controller
{
    function create($staffId){
        $designationForDS=['DS','GS','Clerk'];
        $designationForGS=['GS','Clerk'];
        if(session()->get('user.user_type')=='DS'){
            $designations=$designationForDS;
        }
        elseif(session()->get('user.user_type')=='GS'){
            $designations=$designationForGS;
        }
        else{
            $designations=['DS'];
        }
        return view('staff-workplace.create',compact('designations','staffId'));   
    }

    function edit($staffworkplace,$startDate){
        $start_date=$startDate;
        $staffId=$staffworkplace;
        $designationForDS=['DS','GS','Clerk'];
        $designationForGS=['GS','Clerk'];
        if(session()->get('user.user_type')=='DS'){
            $designations=$designationForDS;
        }
        elseif(session()->get('user.user_type')=='GS'){
            $designations=$designationForGS;
        }
        else{
            $designations=['DS'];
        }
        $staffWorkplace=DB::table('staff_workplaces')
        ->where('staff_id',$staffworkplace)
        ->where('end_date',null)
        ->first();
        // return $staffWorkplace;
        // check start date with today
        if($staffWorkplace->start_date== Carbon::today()->format('20y-m-d')){
                $staffWorkplace=DB::table('staff_workplaces')
                ->where('staff_id',$staffworkplace)
                ->where('end_date',null)
                ->delete();
                return view('staff-workplace.create',compact('designations','staffId'));

        }
        else{
         
            return view('staff-workplace.edit',compact('designations','start_date','staff_id'));
        }
    }

    public function store(Request $req){
        $lastWorkRecord=DB::table('staff_workplaces')
        ->where('staff_id',$req->staffId)
        ->where('start_date',Carbon::today());
        if(!empty($lastWorkRecord)){
            $lastWorkRecord->delete();

            $lastWorkRecord=DB::table('staff_workplaces')
            ->where('staff_id',$req->staffId)
            ->where('end_date',null)
            ->update(
                ['end_date'=>Carbon::yesterday()]
            );
    
            if($req->designation=="DS"){
                $placeId=Division::where('name',$req->workplace)->pluck('division_id')->first();
            }
            else{
                $placeId=GNDivision::where('name',$req->workplace)->pluck('gn_id')->first();
            }
            $staffWorkplace= new StaffWorkplace;
            $staffWorkplace->staff_id=$req->staffId;
            $staffWorkplace->start_date=Carbon::now();
            $staffWorkplace->end_date=null;
            $staffWorkplace->designation=$req->designation;
            $staffWorkplace->place_id=$placeId;
            $staffWorkplace->save();
            return redirect()->back();
        }
        else{
        $lastWorkRecord=DB::table('staff_workplaces')
        ->where('staff_id',$req->staffId)
        ->where('end_date',null)
        ->update(
            ['end_date'=>Carbon::yesterday()]
        );

        if($req->designation=="DS"){
            $placeId=Division::where('name',$req->workplace)->pluck('division_id')->first();
        }
        else{
            $placeId=GNDivision::where('name',$req->workplace)->pluck('gn_id')->first();
        }
        $staffWorkplace= new StaffWorkplace;
        $staffWorkplace->staff_id=$req->staffId;
        $staffWorkplace->start_date=Carbon::now();
        $staffWorkplace->end_date=null;
        $staffWorkplace->designation=$req->designation;
        $staffWorkplace->place_id=$placeId;
        $staffWorkplace->save();
        return redirect()->back();
    }
    }
    function update(Request $req){
        if($req->designation=="DS"){
            $placeId=Division::where('name',$req->workplace)->pluck('division_id')->first();
        }
        else{
            $placeId=GNDivision::where('name',$req->workplace)->pluck('gn_id')->first();
        }
       
        $staffWorkplace= DB::table('staff_workplaces')
        ->where('staff_id',$req->staff_id)
        ->where('start_date',$req->start_date)
        ->update([
            'designation'=>$req->designation,
            'place_id'=>$placeId,
        ]);
        return redirect()->to('/staffs/'.$req->staff_id);
    }
}