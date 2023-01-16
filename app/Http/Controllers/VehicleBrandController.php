<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBrand;

class VehicleBrandController extends Controller
{
    function index(){
        $vehicleBrands=VehicleBrand::all();
        return view('vehicle-type.index',compact('vehicleTypes'));
    }
    function create(){
        return view('vehicle-type.create');
    }
    function store(Request $req){
        $lastVehicleBrandId=VehicleBrand::pluck('vehicle_type_id')->last();
        if(!$lastVehicleBrandId){
            $vehicleBrandId="VT001";
        }
        else{
            $vehicleBrandId=++$lastVehicleBrandId;
        }
        $vehicleBrand = new VehicleBrand;
        $vehicleType->vehicle_type_id=$vehicleTypeId;
        $vehicleType->vehicle_type=$req->vehicle_type;
        $vehicleType->save();
        return redirect()->back();
    }
    function show(){
        return;
    }
    function edit($vehicleType){
        $vehicleType=VehicleBrand::find($vehicleType);
        return view('vehicle-type.edit',compact('vehicleType'));
    }
    function update(Request $req,$vehicleType){
        $vehicleType= VehicleBrand::find($vehicleType);
        $vehicleType->vehicle_type=$req->vehicle_type;
        $vehicleType->save();
        return redirect()->route('vehicleType.index');
    }
    function destroy($vehicleType){
        VehicleBrand::destroy($vehicleType);
        return redirect()->back();
    }
}