<?php
use App\Http\Middleware\EnsureUserLogged;
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
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\LivelihoodController;
use App\Http\Controllers\SocialServiceController;
use App\Http\Controllers\PensionController;
use App\Http\Controllers\VotingDetailController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\DifferentlyAbledPersonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReportController;

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
    // ajax load designation to create page
});
// StaffWorkplace
Route::group(['prefix'=>'staffworkplaces'],function(){
    Route::get('/{staffworkplace}/create',[StaffWorkplaceController::class,'create'])->name('staffWorkplace.create');
    Route::get('/{staffworkplace}/{startDate}/edit',[StaffWorkplaceController::class,'edit'])->name('staffWorkplace.edit');
    Route::post('/',[StaffWorkplaceController::class,'store'])->name('staffWorkplace.store');
    Route::put('/',[StaffWorkplaceController::class,'update'])->name('staffWorkplace.update');
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
// Infrastructure
Route::group(['prefix'=>'infrastructures'],function(){
    Route::get('/',[InfrastructureController::class,'index'])->name('infrastructure.index');
    Route::post('/create',[InfrastructureController::class,'create'])->name('infrastructure.create');
    Route::get('/show',[InfrastructureController::class,'show'])->name('infrastructure.show');
    Route::post('/edit',[InfrastructureController::class,'edit'])->name('infrastructure.edit');
    Route::post('/',[InfrastructureController::class,'store'])->name('infrastructure.store');
    Route::put('/',[InfrastructureController::class,'update'])->name('infrastructure.update');
    Route::delete('/delete',[InfrastructureController::class,'destroy'])->name('infrastructure.destroy');
});
// Animals
Route::group(['prefix'=>'animals'],function(){
    Route::get('/',[AnimalController::class,'index'])->name('animal.index');
    Route::post('/create',[AnimalController::class,'create'])->name('animal.create');
    Route::post('/get-animals',[AnimalController::class,'getAnimalsByFamily'])->name('get-animals.create');
    Route::get('/show',[AnimalController::class,'show'])->name('animal.show');
    Route::post('/edit',[AnimalController::class,'edit'])->name('animal.edit');
    Route::post('/',[AnimalController::class,'store'])->name('animal.store');
    Route::put('/',[AnimalController::class,'update'])->name('animal.update');
    Route::delete('/delete',[AnimalController::class,'destroy'])->name('animal.destroy');
});
// Donation
Route::group(['prefix'=>'donations'],function(){
    Route::get('/',[DonationController::class,'index'])->name('donation.index');
    Route::post('/familyhead-donation-index',[DonationController::class,'familyHeadIndex'])->name('donation.familyHeadDonationIndex');
    Route::get('/create',[DonationController::class,'create'])->name('donation.create');
    Route::get('/show',[DonationController::class,'show'])->name('donation.show');
    Route::post('/edit',[DonationController::class,'edit'])->name('donation.edit');
    Route::post('/',[DonationController::class,'store'])->name('donation.store');
    Route::put('/',[DonationController::class,'update'])->name('donation.update');
    Route::delete('/delete',[DonationController::class,'destroy'])->name('donation.destroy');
});
// Land
Route::group(['prefix'=>'lands'],function(){
    Route::get('/',[LandController::class,'index'])->name('land.index');
    Route::get('/create/{id}',[LandController::class,'create'])->where('id', '.*')->name('land.create');
    Route::get('/show',[LandController::class,'show'])->name('land.show');
    Route::post('/edit',[LandController::class,'edit'])->name('land.edit');
    Route::post('/',[LandController::class,'store'])->name('land.store');
    Route::put('/',[LandController::class,'update'])->name('land.update');
    Route::delete('/delete',[LandController::class,'destroy'])->name('land.destroy');
});
// Tree
Route::group(['prefix'=>'trees'],function(){
    Route::get('/',[TreeController::class,'index'])->name('tree.index');
    Route::get('/create/{id}',[TreeController::class,'create'])->name('tree.create');
    Route::get('/show',[TreeController::class,'show'])->name('tree.show');
    Route::post('/edit',[TreeController::class,'edit'])->name('tree.edit');
    Route::post('/',[TreeController::class,'store'])->name('tree.store');
    Route::put('/',[TreeController::class,'update'])->name('tree.update');
    Route::delete('/delete',[TreeController::class,'destroy'])->name('tree.destroy');
});
// Livelihood
Route::group(['prefix'=>'livelihoods'],function(){
    Route::get('/',[LivelihoodController::class,'index'])->name('livelihood.index');
    Route::post('/familyhead-livelihood-index',[LivelihoodController::class,'indexByFamilyHead'])->name('livelihood.indexByFamilyHead');
    Route::get('/create',[LivelihoodController::class,'create'])->name('livelihood.create');
    Route::get('/show',[LivelihoodController::class,'show'])->name('livelihood.show');
    Route::post('/edit',[LivelihoodController::class,'edit'])->name('livelihood.edit');
    Route::post('/',[LivelihoodController::class,'store'])->name('livelihood.store');
    Route::put('/',[LivelihoodController::class,'update'])->name('livelihood.update');
    Route::post('/delete',[LivelihoodController::class,'destroy'])->name('livelihood.destroy');
});
// Social service
Route::group(['prefix'=>'socialServices'],function(){
    Route::get('/',[SocialServiceController::class,'index'])->name('socialService.index');
    Route::get('social-service-by-family',[SocialServiceController::class,'socialServiceByFamily'])->name('socialService.socialServiceByFamily');
    Route::get('/create/{id}',[SocialServiceController::class,'create'])->where('id', '.*')->name('socialService.create');
    Route::get('/show',[SocialServiceController::class,'show'])->name('socialService.show');
    Route::post('/edit',[SocialServiceController::class,'edit'])->name('socialService.edit');
    Route::post('/',[SocialServiceController::class,'store'])->name('socialService.store');
    Route::put('/',[SocialServiceController::class,'update'])->name('socialService.update');
    Route::delete('/delete',[SocialServiceController::class,'destroy'])->name('socialService.destroy');
});
// Social service
Route::group(['prefix'=>'pensions'],function(){
    Route::get('/',[PensionController::class,'index'])->name('pension.index');
    Route::get('/create/{id}',[PensionController::class,'create'])->where('id','.*')->name('pension.create');
    Route::get('/show',[PensionController::class,'show'])->name('pension.show');
    Route::post('/edit',[PensionController::class,'edit'])->name('pension.edit');
    Route::post('/',[PensionController::class,'store'])->name('pension.store');
    Route::put('/',[PensionController::class,'update'])->name('pension.update');
    Route::delete('/delete',[PensionController::class,'destroy'])->name('pension.destroy');
});
// Voting Detail
Route::group(['prefix'=>'votingDetails'],function(){
    Route::get('/',[VotingDetailController::class,'index'])->name('votingDetail.index');
    Route::get('/create/{id}',[VotingDetailController::class,'create'])->where('id', '.*')->name('votingDetail.create');
    Route::get('/show',[VotingDetailController::class,'show'])->name('votingDetail.show');
    Route::post('/edit',[VotingDetailController::class,'edit'])->name('votingDetail.edit');
    Route::post('/',[VotingDetailController::class,'store'])->name('votingDetail.store');
    Route::put('/',[VotingDetailController::class,'update'])->name('votingDetail.update');
    Route::delete('/delete',[VotingDetailController::class,'destroy'])->name('votingDetail.destroy');
});
// Death
Route::group(['prefix'=>'deaths'],function(){
    Route::get('/',[DeathController::class,'index'])->name('death.index');
    Route::get('/create/{id}',[DeathController::class,'create'])->where('id','.*')->name('death.create');
    Route::get('/show',[DeathController::class,'show'])->name('death.show');
    Route::get('/edit',[DeathController::class,'edit'])->name('death.edit');
    Route::post('/',[DeathController::class,'store'])->name('death.store');
    Route::put('/',[DeathController::class,'update'])->name('death.update');
    Route::delete('/delete',[DeathController::class,'destroy'])->name('death.destroy');
});
// DiffrentlyAbledPerson
Route::group(['prefix'=>'DifferentlyAbledPersons'],function(){
    Route::get('/',[DifferentlyAbledPersonController::class,'index'])->name('differentlyAbledPerson.index');
    Route::get('/create/{id}',[DifferentlyAbledPersonController::class,'create'])->where('id','.*')->name('differentlyAbledPerson.create');
    Route::get('/show',[DifferentlyAbledPersonController::class,'show'])->name('differentlyAbledPerson.show');
    Route::post('/edit',[DifferentlyAbledPersonController::class,'edit'])->name('differentlyAbledPerson.edit');
    Route::post('/',[DifferentlyAbledPersonController::class,'store'])->name('differentlyAbledPerson.store');
    Route::put('/',[DifferentlyAbledPersonController::class,'update'])->name('differentlyAbledPerson.update');
    Route::delete('/delete',[DifferentlyAbledPersonController::class,'destroy'])->name('differentlyAbledPerson.destroy');
});
// Message
Route::group(['prefix'=>'messages'],function(){
    Route::get('/',[MessageController::class,'index'])->name('message.index');
    Route::get('/create',[MessageController::class,'create'])->name('message.create');
    Route::get('/show',[MessageController::class,'show'])->name('message.show');
    Route::post('/edit',[MessageController::class,'edit'])->name('message.edit');
    Route::post('/',[MessageController::class,'store'])->name('message.store');
    Route::put('/',[MessageController::class,'update'])->name('message.update');
    Route::get('/delete/{id}',[MessageController::class,'delete'])->name('message.delete');
    Route::get('/read/{id}',[MessageController::class,'read'])->name('message.read');
    Route::get('/sent',[MessageController::class,'sentMessages'])->name('message.sentMessages');
    Route::get('/sent-deleted/{id}',[MessageController::class,'sentDeleted'])->name('message.sentDeleted');
    Route::get('/getInboxMessages',[MessageController::class,'getInboxMessages'])->name('message.getInboxMessages');
});
// authentication
Route::group(['prefix'=>'auth'],function(){
    Route::get('/',[AuthController::class,'showLogin'])->name('auth.index');
    Route::post('/login',[AuthController::class,'login'])->name('auth.login');
    Route::get('/forget',[AuthController::class,'forget'])->name('auth.forget');
    Route::post('/recover',[AuthController::class,'recover'])->name('auth.recover');
    Route::post('/verify',[AuthController::class,'verifyCode'])->name('auth.verifyCode');
    Route::post('/confirm',[AuthController::class,'storeConfirmedpassword'])->name('auth.storeConfirmedpassword');
    Route::get('/change-password',[AuthController::class,'changePasswordView'])->name('auth.changePasswordView')->middleware(EnsureUserLogged::class);
    Route::post('/change-password',[AuthController::class,'changePassword'])->name('auth.changePassword');
    Route::get('forget_password',[AuthController::class,'customForgetPassword'])->name('auth.customForgetPassword');
    Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
});
// Profile
Route::group(['prefix'=>'profile'],function(){
    Route::get('/',[ProfileController::class,'showUserDetails'])->name('profile.showUserDetails');
    Route::get('/edit',[ProfileController::class,'editProfileDetails'])->name('profile.editProfileDetails');
    Route::put('/update',[ProfileController::class,'updateProfileDetail'])->name('profile.updateProfileDetail');
    Route::post('/verify-code',[ProfileController::class,'verifyCode'])->name('profile.verifyCode');
});
Route::get("/calculatenic/{nic}",[AjaxController::class,'calculateNic']);
Route::get('/loadDesignation/{designtion}',[StaffController::class,'loadDesignation']);

// Report
Route::group(['prefix'=>'Report'],function(){
    Route::get('/generateFamilyReport',[ReportController::class,'generateFamilyReport'])->name('report.generateFamilyReport');
    Route::get('/generateStaffReport',[ReportController::class,'generateStaffReport'])->name('report.generateStaffReport');
    Route::get('/generateStaffDeatailReport/{staff}',[ReportController::class,'generateStaffDeatailReport'])->name('report.generateStaffDeatailReport');
    Route::get('/generateFamilyHeadListReport',[ReportController::class,'generateFamilyHeadListReport'])->name('report.generateFamilyHeadListReport');
});