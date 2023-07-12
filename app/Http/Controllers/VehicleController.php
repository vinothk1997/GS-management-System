<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleModelRequest;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
class VehicleController extends Controller
{
    function create(Request $req){
        $family_id='';
        $family_member_id='';
        if($req->family_id);{
            $family_id=$req->family_id;
        }

        if($req->member_id){
            $family_member_id=$req->member_id;
        }
        $vehicleBrands=VehicleBrand::all();
        return view('vehicle.create',compact('vehicleBrands','family_id','family_member_id'));
    }

    function getVehicleModels($brandId){
        $vehicleModels=VehicleModel::where('brand_id',$brandId)->get();
        $options = '';
        foreach ($vehicleModels as $vehicleModel) {
            $options .= '<option value="' . $vehicleModel->model_id . '">' . $vehicleModel->name . '</option>';
        }

        return $options;

    }

    function store(StoreVehicleModelRequest $req){
        $obj= new Vehicle;
        $obj->model_id=$req->vehicle_model;
        $obj->reg_no=$req->reg_no;
        $obj->reg_date=$req->reg_date;
        $obj->member_id=$req->member_id;
        $obj->family_id=$req->family_id;
        $obj->save();
        return back();
    }

    function edit(StoreVehicleModelRequest $req){
        $vehicleBrands=VehicleBrand::all();
        $vehicle=Vehicle::where('model_id',$req->model_id)
        ->where('member_id',$req->member_id)->first();
        return view('vehicle.edit',compact('vehicleBrands','vehicle'));
    }
}
