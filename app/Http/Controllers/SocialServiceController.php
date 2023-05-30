<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialService;
use App\Http\Requests\StoreSocialServiceRequest;

class SocialServiceController extends Controller
{
    public function index(){
        $socialServices=Socialservice::all();
        return view('social-service.index',compact('socialServices'));

    }

    public function create($id){
        $family_member_id = urldecode($id);
        return view('social-service.create',compact('family_member_id'));

    }
    public function store(StoreSocialServiceRequest $req){
        $lastSocialServiceId=SocialService::pluck('social_service_id')->last();
        if(!$lastSocialServiceId){
            $socialServiceId="SS00000001";
        }
        else{
            $socialServiceId=++$lastSocialServiceId;
        }
        $socialService=new SocialService;
        $socialService->social_service_id=$socialServiceId;
        $socialService->type=$req->type;
        $socialService->amount=$req->amount;
        $socialService->description=$req->description;
        $socialService->year=$req->year;
        $socialService->member_id=$req->member_id;
        $socialService->family_id=$req->family_id;
        $socialService->save();

        return redirect()->to('/family-Members/show?memberId='.$socialService->member_id);

    }
    public function edit(Request $req){
        $socialService=SocialService::find($req->social_service_id);
        return view('social-service.edit',compact('socialService'));

    }
    public function update(Request $req){
        $socialService=SocialService::find($req->social_service_id);
        $socialService->type=$req->type;
        $socialService->amount=$req->amount;
        $socialService->description=$req->description;
        $socialService->year=$req->year;
        $socialService->save();

        return redirect()->to('/family-Members/show?memberId='.$socialService->member_id);

    }
    public function confirmDelete(){

    }
    public function destroy(Request $req){
        $socialService = SocialService::find($req->social_service_id);

        if ($socialService) {
            $memberId = $socialService->member_id;
            $socialService->delete();
        }

        return redirect()->to('/family-Members/show?memberId=' . $memberId);
        
    }
}