<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;

class VehicleModelController extends Controller
{
    function index(){
        $vehicleModels=VehicleModel::all();
        return view('vehicle-model.index',compact('vehicleModels'));
    }
    function create($vehicleBrand){
        $brandId=$vehicleBrand;
        return view('vehicle-model.create',compact('brandId'));
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
        $vehicleModel->brand_id=$req->brandId;
        $vehicleModel->save();
        return redirect()->back();
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
        return redirect()->back();
    }
    function destroy($vehicleModel){
        VehicleModel::destroy($vehicleModel);
        return redirect()->back();
    }   
}