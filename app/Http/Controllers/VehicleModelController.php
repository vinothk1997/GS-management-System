<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Models\VehicleType;

class VehicleModelController extends Controller
{
    function index(){
        $vehicleModels=VehicleModel::all();
        return view('vehicle-model.index',compact('vehicleModels'));
    }
    function create($vehicleBrand){
        $brandId=$vehicleBrand;
        $vehicleTypes=vehicleType::all();
        return view('vehicle-model.create',compact('brandId','vehicleTypes'));
    }
    function store(Request $req){
        $lastVehicleModelId=VehicleModel::pluck('model_id')->last();
        if(!$lastVehicleModelId){
            $vehicleModelId="VM001";
        }
        else{
            $vehicleModelId=++$lastVehicleModelId;
        }
        $vehicleModel = new VehicleModel;
        $vehicleModel->model_id=$vehicleModelId;
        $vehicleModel->name=$req->name;
        $vehicleModel->vehicle_type_id=$req->vehicleType;
        $vehicleModel->brand_id=$req->brandId;
        $vehicleModel->save();
        return redirect()->back()->with(['msg'=>'Added succesfully']);
    }
    function show(){
        return;
    }
    function edit($vehicleModel){
        $vehicleModel=VehicleModel::find($vehicleModel);
        // return $vehicleModel;
        return view('vehicle-model.edit',compact('vehicleModel'));
    }
    function update(Request $req,$vehicleModel){
        $vehicleModel= VehicleModel::find($vehicleModel);
        $vehicleModel->name=$req->name;
        $vehicleModel->save();
        return redirect()->back()->with(['msg'=>'Updated succesfully']);
    }
    function destroy($vehicleModel){
        VehicleModel::destroy($vehicleModel);
        return redirect()->back()->with(['msg'=>'Deleted succesfully']);
    }   
}