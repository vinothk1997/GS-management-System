<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleTypeRequest;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    function index(){
        $vehicleTypes=VehicleType::all();
        return view('vehicle-type.index',compact('vehicleTypes'));
    }
    function create(){
        return view('vehicle-type.create');
    }
    function store(StoreVehicleTypeRequest $req){
        $lastVehicleTypeId=VehicleType::pluck('vehicle_type_id')->last();
        if(!$lastVehicleTypeId){
            $vehicleTypeId="VT001";
        }
        else{
            $vehicleTypeId=++$lastVehicleTypeId;
        }
        $vehicleType = new VehicleType;
        $vehicleType->vehicle_type_id=$vehicleTypeId;
        $vehicleType->vehicle_type=$req->vehicle_type;
        $vehicleType->save();
        return redirect()->back()->with(['msg'=>'Added succesfully']);
    }

    function show(){
        return;
    }
    function edit($vehicleType){
        $vehicleType=VehicleType::find($vehicleType);
        return view('vehicle-type.edit',compact('vehicleType'));
    }
    function update(StoreVehicleTypeRequest $req,$vehicleType){
        $vehicleType= VehicleType::find($vehicleType);
        $vehicleType->vehicle_type=$req->vehicle_type;
        $vehicleType->save();
        return redirect()->route('vehicleType.index')->with(['msg'=>'Updated succesfully']);
    }
    function destroy($vehicleType){
        VehicleType::destroy($vehicleType);
        return redirect()->back()->with(['msg'=>'Deleted succesfully']);
    }
}