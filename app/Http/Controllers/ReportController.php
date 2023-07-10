<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FamilyHeadController;
use DB;
use App\Models\FamilyMember;
use App\Models\Religion;
use App\Models\Ethnic;
use App\Models\Occupation;
use App\Models\FamilyHead;
use App\Models\Staff;
use App\Models\Tree;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

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

    function createFamilyBasedDOB(){
        return view('report.family-report1');
    }

    function generateFamilyBasedDOB(Request $req){
        if($req->end_date>=$req->start_date){
            $familyHeads = FamilyHead::where('dob', '>', $req->start_date)
            ->where('dob', '<', $req->end_date)
            ->get();
            return $familyHeads;
        }
        else{
            return '';
        }
    }

    function createFamilyBasedGenderAndAge(){
        return view('report.family-report2');
    }

    function generateFamilyBasedGenderAndAge(Request $request){
        $familyMembers = [];
    
        if ($request->age != "" && $request->gender != "") {
            $familyHeads = FamilyHead::where('gender', $request->gender)->get();
            $date = Carbon::now()->subYear($request->age)->format('Y-m-d');
    
            foreach ($familyHeads as $familyHead) {
                $filteredFamilyMembers = $familyHead->FamilyMembers->where('dob', '>', $date);
                foreach($filteredFamilyMembers as $familyMember){
                    $memberData = $familyMember->toArray();
                    $memberData['education'] = $familyMember->Education->name;
                    $familyMembers[] = $memberData;
                }
            }
        }
    
        return $familyMembers;
    }

    function createTreeReport(){
        return view('report.tree-report');
    }

    function generateTreeReport(Request $req){
        $result = Tree::select('tree_name', DB::raw('SUM(no_of_tree) as total'));
        if($req->tree_name!='All'){
            $result= $result->where('tree_name', $req->tree_name);
        }
        $result=$result->groupBy('tree_name')
        ->get();
        return $result;
    }

    function createFamilyIncomeReport(){
        return view('report.family-income-report');
    }

    function generateFamilyIncomeReport(Request $req) {
        $familyMembers = [];
        $familyHeads = FamilyHead::all();
        foreach ($familyHeads as $familyHead) {
            $family_id = $familyHead->family_id;
            $last_name = $familyHead->last_name;
            $first_name = $familyHead->first_name;
            
            $income = FamilyMember::where('family_id', $family_id)
                ->selectRaw('SUM(monthly_income) as income')
                ->where('monthly_income','>',$req->income_from)
                ->where('monthly_income','<',$req->income_to)
                ->groupBy('family_id')
                ->first();
                if(!empty($income)){
                    $familyMember = [
                        'family_id' => $family_id,
                        'last_name' => $last_name,
                        'first_name' => $first_name,
                        'income' => $income->income
                    ];
                    $familyMembers[] = $familyMember;
                }
        }
        return $familyMembers;
    }


    function createFamilyVehicleReport(){
        $vehicleTypes=VehicleType::all();
        return view('report.family-vehicle',compact('vehicleTypes'));
    }

    function generateFamilyVehicleReport(Request $req){
        // return $req->vehicle_type;
        $families=[];
        $vehicles=[];
        $family;

        $vehicles=Vehicle::whereHas('VehicleModel', function (Builder $query)  use ($req) {
            $query->whereHas('VehicleType',function (Builder $query) use ($req){
                if($req->vehicle_type !='all'){
                    $query-> where('vehicle_type_id',$req->vehicle_type);
                }
            });
        })->get();

        foreach($vehicles as $vehicle){
            if(!empty($vehicle->family_id)){
                
                $family=[
                    'id'=>$vehicle->FamilyHead->family_id,
                    'name'=>$vehicle->FamilyHead->last_name.' '.$vehicle->familyHead->first_name,
                    'reg_no'=>$vehicle->reg_no,
                    'reg_date'=>$vehicle->reg_date,
    
                ];
                $families[]=$family;
            }
            elseif(!empty($vehicle->member_id)){
                $family=[
                    'id'=>$vehicle->FamilyMember->member_id,
                    'name'=>$vehicle->FamilyMember->last_name.' '.$vehicle->FamilyMember->first_name,
                    'reg_no'=>$vehicle->reg_no,
                    'reg_date'=>$vehicle->reg_date,
        
                    ];
                    $families[]=$family;
                }

            else{
                return [];
            }

        }
            return $families;
    }
}
