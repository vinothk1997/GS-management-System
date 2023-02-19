<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AssistTypeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EthnicController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\VehicleBrandController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\StaffWorkplaceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GnDivisionController;
use App\Http\Controllers\FamilyHeadController;
use App\Http\Controllers\FamilyMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Districts
Route::group(['prefix'=>'districts'],function(){
    Route::get('/',[DistrictController::class,'index'])->name('district.index');
    Route::get('/create',[DistrictController::class,'create'])->name('district.create');
    Route::get('/{district}/show',[DistrictController::class,'show'])->name('district.show');
    Route::get('/{district}/edit',[DistrictController::class,'edit'])->name('district.edit');
    Route::post('/',[DistrictController::class,'store'])->name('district.store');
    Route::put('/{district}',[DistrictController::class,'update'])->name('district.update');
    Route::delete('/{district}',[DistrictController::class,'destroy'])->name('district.destroy');
});
// Assist type
Route::group(['prefix'=>'assistTypes'],function(){
    Route::get('/',[AssistTypeController::class,'index'])->name('assistType.index');
    Route::get('/create',[AssistTypeController::class,'create'])->name('assistType.create');
    Route::get('/{assist}',[AssistTypeController::class,'show'])->name('assistType.show');
    Route::get('/{assist}/edit',[AssistTypeController::class,'edit'])->name('assistType.edit');
    Route::post('/',[AssistTypeController::class,'store'])->name('assistType.store');
    Route::put('/{assist}',[AssistTypeController::class,'update'])->name('assistType.update');
    Route::delete('/{assist}',[AssistTypeController::class,'destroy'])->name('assistType.destroy');
});
// Education
Route::group(['prefix'=>'educations'],function(){
    Route::get('/',[EducationController::class,'index'])->name('education.index');
    Route::get('/create',[EducationController::class,'create'])->name('education.create');
    Route::get('/{education}',[EducationController::class,'show'])->name('education.show');
    Route::get('/{education}/edit',[EducationController::class,'edit'])->name('education.edit');
    Route::post('/',[EducationController::class,'store'])->name('education.store');
    Route::put('/{education}',[EducationController::class,'update'])->name('education.update');
    Route::delete('/{education}',[EducationController::class,'destroy'])->name('education.destroy');
});
// Ethnics
Route::group(['prefix'=>'ethnics'],function(){
    Route::get('/',[EthnicController::class,'index'])->name('ethnic.index');
    Route::get('/create',[EthnicController::class,'create'])->name('ethnic.create');
    Route::get('/{ethnic}',[EthnicController::class,'show'])->name('ethnic.show');
    Route::get('/{ethnic}/edit',[EthnicController::class,'edit'])->name('ethnic.edit');
    Route::post('/',[EthnicController::class,'store'])->name('ethnic.store');
    Route::put('/{ethnic}',[EthnicController::class,'update'])->name('ethnic.update');
    Route::delete('/{ethnic}',[EthnicController::class,'destroy'])->name('ethnic.destroy');
});
// Occupations
Route::group(['prefix'=>'occupations'],function(){
    Route::get('/',[OccupationController::class,'index'])->name('occupation.index');
    Route::get('/create',[OccupationController::class,'create'])->name('occupation.create');
    Route::get('/{occupation}',[OccupationController::class,'show'])->name('occupation.show');
    Route::get('/{occupation}/edit',[OccupationController::class,'edit'])->name('occupation.edit');
    Route::post('/',[OccupationController::class,'store'])->name('occupation.store');
    Route::put('/{occupation}',[OccupationController::class,'update'])->name('occupation.update');
    Route::delete('/{occupation}',[OccupationController::class,'destroy'])->name('occupation.destroy');
});
// Organizations
Route::group(['prefix'=>'organizations'],function(){
    Route::get('/',[OrganizationController::class,'index'])->name('organization.index');
    Route::get('/create',[OrganizationController::class,'create'])->name('organization.create');
    Route::get('/{organization}',[OrganizationController::class,'show'])->name('organization.show');
    Route::get('/{organization}/edit',[OrganizationController::class,'edit'])->name('organization.edit');
    Route::post('/',[OrganizationController::class,'store'])->name('organization.store');
    Route::put('/{organization}',[OrganizationController::class,'update'])->name('organization.update');
    Route::delete('/{organization}',[OrganizationController::class,'destroy'])->name('organization.destroy');
});
// Religions
Route::group(['prefix'=>'religions'],function(){
    Route::get('/',[ReligionController::class,'index'])->name('religion.index');
    Route::get('/create',[ReligionController::class,'create'])->name('religion.create');
    Route::get('/{religion}',[ReligionController::class,'show'])->name('religion.show');
    Route::get('/{religion}/edit',[ReligionController::class,'edit'])->name('religion.edit');
    Route::post('/',[ReligionController::class,'store'])->name('religion.store');
    Route::put('/{religion}',[ReligionController::class,'update'])->name('religion.update');
    Route::delete('/{religion}',[ReligionController::class,'destroy'])->name('religion.destroy');
});
// Vehicle Brand
Route::group(['prefix'=>'vehicleBrands'],function(){
    Route::get('/',[VehicleBrandController::class,'index'])->name('vehicleBrand.index');
    Route::get('/create',[VehicleBrandController::class,'create'])->name('vehicleBrand.create');
    Route::get('/{vehicleBrand}',[VehicleBrandController::class,'show'])->name('vehicleBrand.show');
    Route::get('/{vehicleBrand}/edit',[VehicleBrandController::class,'edit'])->name('vehicleBrand.edit');
    Route::post('/',[VehicleBrandController::class,'store'])->name('vehicleBrand.store');
    Route::put('/{vehicleBrand}',[VehicleBrandController::class,'update'])->name('vehicleBrand.update');
    Route::delete('/{vehicleBrand}',[VehicleBrandController::class,'destroy'])->name('vehicleBrand.destroy');
});
// Vehicle Types
Route::group(['prefix'=>'vehicleTypes'],function(){
    Route::get('/',[VehicleTypeController::class,'index'])->name('vehicleType.index');
    Route::get('/create',[VehicleTypeController::class,'create'])->name('vehicleType.create');
    Route::get('/{vehicleType}',[VehicleTypeController::class,'show'])->name('vehicleType.show');
    Route::get('/{vehicleType}/edit',[VehicleTypeController::class,'edit'])->name('vehicleType.edit');
    Route::post('/',[VehicleTypeController::class,'store'])->name('vehicleType.store');
    Route::put('/{vehicleType}',[VehicleTypeController::class,'update'])->name('vehicleType.update');
    Route::delete('/{vehicleType}',[VehicleTypeController::class,'destroy'])->name('vehicleType.destroy');
});
// Vehicle Models
Route::group(['prefix'=>'vehicleModels'],function(){
    Route::get('/',[VehicleModelController::class,'index'])->name('vehicleModel.index');
    Route::get('/{vehicleBrand}/create',[VehicleModelController::class,'create'])->name('vehicleModel.create');
    Route::get('/{vehicleModel}',[VehicleModelController::class,'show'])->name('vehicleModel.show');
    Route::get('/{vehicleModel}/edit',[VehicleModelController::class,'edit'])->name('vehicleModel.edit');
    Route::post('/',[VehicleModelController::class,'store'])->name('vehicleModel.store');
    Route::put('/{vehicleModel}',[VehicleModelController::class,'update'])->name('vehicleModel.update');
    Route::delete('/{vehicleModel}',[VehicleModelController::class,'destroy'])->name('vehicleModel.destroy');
});
// Staff
Route::group(['prefix'=>'staffs'],function(){
    Route::get('/',[StaffController::class,'index'])->name('staff.index');
    Route::get('/create',[StaffController::class,'create'])->name('staff.create');
    Route::get('/{staff}',[StaffController::class,'show'])->name('staff.show');
    Route::get('/{staff}/edit',[StaffController::class,'edit'])->name('staff.edit');
    Route::post('/',[StaffController::class,'store'])->name('staff.store');
    Route::put('/{staff}',[StaffController::class,'update'])->name('staff.update');
    Route::delete('/{staff}',[StaffController::class,'destroy'])->name('staff.destroy');
});
// StaffWorkplace
Route::group(['prefix'=>'staffworkplaces'],function(){
    Route::get('/',[StaffWorkplaceController::class,'index'])->name('staffWorkplace.index');
    Route::get('/{staffworkplace}/create',[StaffWorkplaceController::class,'create'])->name('staffWorkplace.create');
    Route::get('/{staffworkplace}/{startDate}/show',[StaffWorkplaceController::class,'show'])->name('staffWorkplace.show');
    Route::get('/{staffworkplace}/{startDate}/edit',[StaffWorkplaceController::class,'edit'])->name('staffWorkplace.edit');
    Route::post('/',[StaffWorkplaceController::class,'store'])->name('staffWorkplace.store');
    Route::put('/{staffworkplace}/{startDate}',[StaffWorkplaceController::class,'update'])->name('staffWorkplace.update');
    Route::delete('/{staffworkplace}/{startDate}',[StaffWorkplaceController::class,'destroy'])->name('staffWorkplace.destroy');
});
// Division
Route::group(['prefix'=>'divisions'],function(){
    Route::get('/',[DivisionController::class,'index'])->name('division.index');
    Route::get('/{districtID}/create',[DivisionController::class,'create'])->name('division.create');
    Route::get('/{division}/show',[DivisionController::class,'show'])->name('division.show');
    Route::get('/{division}/edit',[DivisionController::class,'edit'])->name('division.edit');
    Route::post('/',[DivisionController::class,'store'])->name('division.store');
    Route::put('/{division}',[DivisionController::class,'update'])->name('division.update');
    Route::delete('/{division}',[DivisionController::class,'destroy'])->name('division.destroy');
});
// GN Division
Route::group(['prefix'=>'GN-Divisions'],function(){
    Route::get('/',[GnDivisionController::class,'index'])->name('gn.index');
    Route::get('/{divisionId}/create',[GnDivisionController::class,'create'])->name('gn.create');
    Route::get('/{gn}',[GnDivisionController::class,'show'])->name('gn.show');
    Route::get('/{gn}/edit',[GnDivisionController::class,'edit'])->name('gn.edit');
    Route::post('/',[GnDivisionController::class,'store'])->name('gn.store');
    Route::put('/{gn}',[GnDivisionController::class,'update'])->name('gn.update');
    Route::delete('/{gn}',[GnDivisionController::class,'destroy'])->name('gn.destroy');
});
// Family Head
Route::group(['prefix'=>'family-Heads'],function(){
    Route::get('/',[FamilyHeadController::class,'index'])->name('familyHead.index');
    Route::get('/create',[FamilyHeadController::class,'create'])->name('familyHead.create');
    Route::get('/show',[FamilyHeadController::class,'show'])->name('familyHead.show');
    Route::post('/edit',[FamilyHeadController::class,'edit'])->name('familyHead.edit');
    Route::post('/',[FamilyHeadController::class,'store'])->name('familyHead.store');
    Route::put('/',[FamilyHeadController::class,'update'])->name('familyHead.update');
    Route::delete('/',[FamilyHeadController::class,'destroy'])->name('familyHead.destroy');
});
// Family Members
Route::group(['prefix'=>'family-Members'],function(){
    Route::get('/',[FamilyMemberController::class,'index'])->name('familyMember.index');
    Route::get('/create',[FamilyMemberController::class,'create'])->name('familyMember.create');
    Route::get('/show',[FamilyMemberController::class,'show'])->name('familyMember.show');
    Route::post('/edit',[FamilyMemberController::class,'edit'])->name('familyMember.edit');
    Route::post('/',[FamilyMemberController::class,'store'])->name('familyMember.store');
    Route::put('/',[FamilyMemberController::class,'update'])->name('familyMember.update');
    Route::delete('/delete',[FamilyMemberController::class,'destroy'])->name('familyMember.destroy');
});