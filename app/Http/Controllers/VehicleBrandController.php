<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBrand;

class VehicleBrandController extends Controller
{
    function index(){
        $vehicleBrands=VehicleBrand::all();
        return view('vehicle-brand.index',compact('vehicleBrands'));
    }
    function create(){
        return view('vehicle-brand.create');
    }
    function store(Request $req){
        $lastVehicleBrandId=VehicleBrand::pluck('brand_id')->last();
        if(!$lastVehicleBrandId){
            $vehicleBrandId="VB001";
        }
        else{
            $vehicleBrandId=++$lastVehicleBrandId;
        }
        $vehicleBrand = new VehicleBrand;
        $vehicleBrand->brand_id=$vehicleBrandId;
        $vehicleBrand->name=$req->name;
        $vehicleBrand->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($vehicleBrand){
        $vehicleType=VehicleBrand::find($vehicleBrand);
        return view('vehicle-type.edit',compact('vehicleType'));
    }
    function update(Request $req,$vehicleBrand){
        $vehicleBrand= VehicleBrand::find($vehicleBrand);
        $vehicleBrand->name=$req->name;
        $vehicleBrand->save();
        return redirect()->route('vehicleType.index');
    }
    function destroy($vehicleBrand){
        VehicleBrand::destroy($vehicleBrand);
        return redirect()->back();
    }
}