<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
class VehicleController extends Controller
{
    function create($memberId){
        $vehicleBrands=VehicleBrand::all();
        $memberId=$memberId;
        return view('vehicle.create',compact('vehicleBrands','memberId'));
    }

    function getVehicleModels($brandId){
        $vehicleModels=VehicleModel::where('brand_id',$brandId)->get();
        $options = '';
        foreach ($vehicleModels as $vehicleModel) {
            $options .= '<option value="' . $vehicleModel->model_id . '">' . $vehicleModel->name . '</option>';
        }

        return $options;

    }

    function store(Request $req){
        $obj= new Vehicle;
        $obj->model_id=$req->vehicle_model;
        $obj->reg_no=$req->reg_no;
        $obj->reg_date=$req->reg_date;
        $obj->member_id=$req->member_id;
        $obj->save();
        return back();
    }
}
