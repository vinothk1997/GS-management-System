<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Organization;
use DB;

class DonationController extends Controller
{
    function index(){
       $donations=DB::table('donations')
       ->join('organizations','donations.organization_id','organizations.organization_id')
       ->select('donations.*','organizations.name as organization')
       ->get();
        return view('donation.index',compact('donations'));

    }
    function create(){
        $organizations=Organization::pluck('name');
        return view('donation.create',compact('organizations'));

    }
    function store(Request $req){
        $organizationId=Organization::where('name',$req->organization)->pluck('organization_id')->first();
           $lastDonationId=Donation::pluck('donation_id')->last();
           if(!$lastDonationId){
               $donationId="DN001";
           }
           else{
               $donationId=++$lastDonationId;
           }
        $donation= new Donation;
        $donation->family_id=$req->familyId;
        $donation->donation_id=$donationId;
        $donation->date=$req->donated_date;
        $donation->organization_id=$organizationId;
        $donation->type=$req->donation_type;
        $donation->amount=$req->amount;
        $donation->description=$req->description;
        $donation->save();
        return redirect()->route('donation.index');
    }
    function edit(Request $req){
        $donation=DB::table('donations')
        ->join('organizations','donations.organization_id','organizations.organization_id')
        ->where('donation_id',$req->donation_id)
        ->select('donations.*','organizations.name as organization')
        ->first();
 
        return view('donation.edit',compact('donation'));

    }
    function update(Request $req){
        $organizationId=Organization::where('name',$req->organization)->pluck('organization_id')->first();

        $donation=Donation::find($req->donation_id);
        $donation->family_id=$req->familyId;
        $donation->date=$req->donated_date;
        $donation->organization_id=$organizationId;
        $donation->type=$req->donation_type;
        $donation->amount=$req->amount;
        $donation->description=$req->description;
        $donation->save();
        return redirect()->route('donation.index');
    }
    function confirmDelete(){
        
    }
    function destroy(Request $req){
        Donation::destroy($req->donation_id);
        return redirect()->route('donation.index');
    }
}