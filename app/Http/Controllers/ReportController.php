<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FamilyHeadController;
use DB;
use App\Models\FamilyMember;
use App\Models\Religion;
use App\Models\Ethnic;
use App\Models\Occupation;
use App\Models\Staff;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
   
    public function generateFamilyReport(Request $req){
        $familyId=$req->familyId;
        $familyHead=DB::table('family_heads')
        ->join('users','family_id','user_id')
        ->first();
        $familyMembers=FamilyMember::where('family_id',$familyId)->get();
        $religion=Religion::find($familyHead->religion_id)->pluck('name')->first();
        $ethnic=Ethnic::find($familyHead->ethnic_id)->pluck('name')->first();
        $occupation=Occupation::find($familyHead->occupation_id)->pluck('name')->first();
        $pdf = Pdf::loadView('report.family-report', compact('familyHead','familyMembers','religion','ethnic','occupation'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('A4', 'portrait');
        return $pdf->stream('Family.pdf');
    }
    public function generateStaffReport(){
        $staffs=Staff::all();
        $pdf = Pdf::loadView('report.staff-report', compact('staffs'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('A4', 'portrait');
        return $pdf->stream('staffs.pdf');

    }

    function generateStaffDeatailReport($staff){
        $staffId=$staff;
        $staff=DB::table('staff')
        ->join('users','staff.staff_id','users.user_id')
        ->where('staff.staff_id',$staff)
        ->select('staff.*','users.status','users.user_type')->first();
        
         $staffs=DB::table('staff')
        ->join('staff_workplaces','staff.staff_id','staff_workplaces.staff_id')
        ->join('users','staff.staff_id','users.user_id')
        ->where('staff.staff_id',$staffId)
        ->select('staff.*','staff_workplaces.designation','users.status')->get();
        $staffWorkplaces=[];
        foreach($staffs as $obj){
            if($obj->designation =="DS"){
                    $staffWorkplaces=DB::table('staff_workplaces')
                    ->join('divisions','staff_workplaces.place_id','divisions.division_id')
                    ->get();
            }
            else{
                $staffWorkplaces=DB::table('staff_workplaces')
                    ->join('gn_divisions','staff_workplaces.place_id','gn_divisions.gn_id')
                    ->get();
                
            }
        }
        $pdf = Pdf::loadView('report.staff-workplace-report', compact('staffWorkplaces','staffId','staff'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('A4', 'portrait');
        return $pdf->stream('staff_workplace.pdf');
    }

    function generateFamilyHeadListReport(){

        $familyHeads=DB::table('family_heads')
        ->join('users','family_id','user_id')
        ->select('family_heads.*','users.status')
        ->get();
        $pdf = Pdf::loadView('report.family-head-list-report', compact('familyHeads'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('A4', 'portrait');
        return $pdf->stream('FamilyHeads.pdf');
    }
}
