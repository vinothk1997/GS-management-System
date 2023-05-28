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
        return $pdf->stream('invoice.pdf');
    }
    public function generateStaffReport(){
        $staffs=Staff::all();
        $pdf = Pdf::loadView('report.staff-report', compact('staffs'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('A4', 'portrait');
        return $pdf->stream('invoice.pdf');

    }
}
