<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    function index(){
        $organizations=Organization::all();
        return view('organization.index',compact('organizations'));
    }
    function create(){
        return view('organization.create');
    }
    function store(Request $req){
        // return $req;
        $lastOrganizationId=Organization::pluck('organization_id')->last();
        if(!$lastOrganizationId){
            $organizationId="OR001";
        }
        else{
            $organizationId=++$lastOrganizationId;
        }
        $organization = new Organization;
        $organization->organization_id=$organizationId;
        $organization->name=$req->name;
        $organization->description=$req->description;
        $organization->mobile=$req->mobile;
        $organization->landline_no=$req->landline;
        $organization->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($organization){
        $occupation=Organization::find($organization);
        return view('organization.edit',compact('organization'));
    }
    function update(Request $req,$organization){
        $organization= Organization::find($organization);
        $organization->name=$req->name;
        $organization->save();
        return redirect()->route('organization.index');
    }
    function destroy($organization){
        Organization::destroy($organization);
        return redirect()->back();
    }
}