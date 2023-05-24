<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Organization;
use Carbon\Carbon;
use DB;
use App\Http\Requests\StoreDonationRequest;

class DonationController extends Controller
{
    function index(){
       $donations=DB::table('donations')
       ->join('organizations','donations.organization_id','organizations.organization_id')
       ->select('donations.*','organizations.name as organization')
       ->get();
        return view('donation.index',compact('donations'));

    }

    function familyHeadIndex(Request $req){
        $family_id=$req->family_id;
        $donations=DB::table('donations')
        ->join('organizations','donations.organization_id','organizations.organization_id')
        ->where('family_id',$req->family_id)
        ->select('donations.*','organizations.name as organization')
        ->orderby('date','asc')
        // ->groupBy('donations.donation_id','donations.family_id')
        // ->having('donations.type')
        ->get();
        return view('donation.familyHead-index',compact('donations','family_id'));
    }

    function create(Request $req){
        $family_id=$req->family_id;
        $donations=Donation::all();
        $organizations=Organization::all();
        return view('donation.create',compact('organizations','family_id','donations'));

    }

    function store(StoreDonationRequest $req){
        $lastDonationId=Donation::pluck('donation_id')->last();
        if(!$lastDonationId){
            $donationId="DN001";
        }
        else{
            $donationId=++$lastDonationId;
        }
            $donation= new Donation;
            $donation->donation_id=$donationId;
            $donation->family_id=$req->familyId;
            $donation->date=$req->donated_date;
            $donation->organization_id=$req->organization;
            $donation->type=$req->donation_type;
            $donation->amount=$req->amount;
            $donation->description=$req->description;
            $donation->save();
            return redirect()->back();
        }

    function edit(Request $req){
        $family_id=$req->family_id;
        $organizations=Organization::all();
        $donation=DB::table('donations')
        ->join('organizations','donations.organization_id','organizations.organization_id')
        ->where('donation_id',$req->donation_id)
        ->where('family_id',$family_id)
        ->select('donations.*','organizations.name as organization')
        ->first();
 
        return view('donation.edit',compact('donation','organizations','family_id'));

    }
    
    function update(Request $req){
        $donation=Donation::find($req->donation_id);   
        $donation->organization_id=$req->organization;
        $donation->type=$req->donation_type;
        $donation->amount=$req->amount;
        $donation->description=$req->description;
        $donation->save();  
    }

    function destroy(Request $req){
        Donation::destroy($req->donation_id);
        return redirect()->back();
    }
}