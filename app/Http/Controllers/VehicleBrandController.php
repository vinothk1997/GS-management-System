<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;

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
        $vehicleBrand->brand=$req->brand;
        $vehicleBrand->save();
        return redirect()->back();
    }
    function show($vehicleBrand){
        $vehicleModels=VehicleModel::where('brand_id',$vehicleBrand)->get();
        $brandId=$vehicleBrand;
        return view('vehicle-brand.show',compact('vehicleModels','brandId'));
    }
    function edit($vehicleBrand){
        $vehicleBrand=VehicleBrand::find($vehicleBrand);
        return view('vehicle-brand.edit',compact('vehicleBrand'));
    }
    function update(Request $req,$vehicleBrand){
        $vehicleBrand= VehicleBrand::find($vehicleBrand);
        $vehicleBrand->brand=$req->brand;
        $vehicleBrand->save();
        return redirect()->route('vehicleBrand.index');
    }
    function destroy($vehicleBrand){
        VehicleBrand::destroy($vehicleBrand);
        return redirect()->back();
    }
}