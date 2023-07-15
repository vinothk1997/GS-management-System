<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Occupation;
use App\Models\Education;
use App\Models\Religion;
use App\Models\Ethnic;

class DashboardController extends Controller
{
    public $familyHeads;
    public $familyMembers;

    public function __construct()
    {
        $this->familyHeads = FamilyHead::all();
        $this->familyMembers = FamilyMember::all();
    }
    function showDashboard(){
        return view('dashboard');
    }
    function generateAgeBasisBarGraph(){
        $familyHeads=$this->familyHeads;
        $familyMembers=$this->familyMembers;

        $data = [
            'data_1' => self::getAgeBasisDataCount(0,18,$familyHeads,$familyMembers),
            'data_2' => self::getAgeBasisDataCount(18,25,$familyHeads,$familyMembers),
            'data_3' => self::getAgeBasisDataCount(25,40,$familyHeads,$familyMembers),
            'data_4' => self::getAgeBasisDataCount(40,60,$familyHeads,$familyMembers),
            'data_5' => self::getAgeBasisDataCount(60,100,$familyHeads,$familyMembers)
        ];

        return $data;
        
    }

    static function getAgeBasisDataCount($start,$end,$familyHeads,$familyMembers){
        // return Carbon::now()->subYear($start).'   '.Carbon::now()->subYear($end);
        return (int)($familyHeads->where('dob', '<', Carbon::now()->subYear($start))
        ->where('dob', '>', Carbon::now()->subYear($end))
        ->count())+ 
        (int)($familyMembers->where('dob', '<', Carbon::now()->subYear($start))
        ->where('dob', '>', Carbon::now()->subYear($end))
        ->count());
    }

    function generateAgeAndGenderBasisGraph(){
        $familyHeads=$this->familyHeads;
        $familyMembers=$this->familyMembers;
        $data=[];
        $data = [
            'm_data_1' => self::generateAgeAndGenderBasisData(0,18,'Male',$familyHeads,$familyMembers),
            'm_data_2' => self::generateAgeAndGenderBasisData(18,25,'Male',$familyHeads,$familyMembers),
            'm_data_3' => self::generateAgeAndGenderBasisData(25,40,'Male',$familyHeads,$familyMembers),
            'm_data_4' => self::generateAgeAndGenderBasisData(40,60,'Male',$familyHeads,$familyMembers),
            'm_data_5' => self::generateAgeAndGenderBasisData(60,100,'Male',$familyHeads,$familyMembers),
            'f_data_1' => self::generateAgeAndGenderBasisData(0,18,'Female',$familyHeads,$familyMembers),
            'f_data_2' => self::generateAgeAndGenderBasisData(18,25,'Female',$familyHeads,$familyMembers),
            'f_data_3' => self::generateAgeAndGenderBasisData(25,40,'Female',$familyHeads,$familyMembers),
            'f_data_4' => self::generateAgeAndGenderBasisData(40,60,'Female',$familyHeads,$familyMembers),
            'f_data_5' => self::generateAgeAndGenderBasisData(60,100,'Female',$familyHeads,$familyMembers)
        ];
      
        return $data ;
    }

    static function generateAgeAndGenderBasisData($start,$end,$gender,$familyHeads,$familyMembers){
        return (int)($familyHeads->where('dob', '<', Carbon::now()->subYear($start))
        ->where('dob', '>', Carbon::now()->subYear($end))
        ->where('gender',$gender)
        ->count())+ 
        (int)($familyMembers->where('dob', '<', Carbon::now()->subYear($start))
        ->where('dob', '>', Carbon::now()->subYear($end))
        ->where('gender',$gender)
        ->count());
    }

    function generateGenderBasisGraph(){
        $familyHeads=$this->familyHeads;
        $familyMembers=$this->familyMembers;

        $data=[
            'male'=>(int)($familyHeads->where('gender','Male')->count())+(int)($familyMembers->where('gender','male')->count()),
            'female'=>(int)($familyHeads->where('gender','Female')->count())+(int)($familyMembers->where('gender','female')->count()),
        ];
        return $data;
    }

    function generateMaleFemaleLeardershipBasisGraph(){
        $familyHeads=$this->familyHeads;

        $data=[
            'male'=>(int)($familyHeads->where('gender','Male')->count()),
            'female'=>(int)($familyHeads->where('gender','Female')->count())
        ];
        return $data;
    }

    function generateOcupationWiseGraph(){
        $data=[];
        $occupations=Occupation::pluck('name');
        $relationship='occupation';
        foreach($occupations as $occupation){
            $occupation=[
                $occupation=>self::generateManagementWiseGraphData($relationship,$occupation)
            ];
            $data=$data+$occupation;
        }
        $keys = array_keys((array) $data);
        $values = array_values((array) $data);
        
        return [
            'keys'=>$keys,
            'values'=>$values,
        ];

    }
    function generateEducationWiseGraph(){
        $data=[];
        $educations=Education::pluck('name');
        foreach($educations as $education){
            $education=[$education=>(int)FamilyMember::whereHas('Education',function (Builder $query) use($education){
                $query->where('name',$education);
            })->get()->count()];
            $data=$data+$education;
        }
        $keys = array_keys((array) $data);
        $values = array_values((array) $data);
        
        return [
            'keys'=>$keys,
            'values'=>$values,
        ];

    }

    static function generateManagementWiseGraphData($relationship,$data){
        $familyHeads=(int)FamilyHead::whereHas($relationship,function (Builder $query) use($data){
            $query->where('name',$data);
        })->get()->count();
        $familyMembers=(int)FamilyMember::whereHas($relationship,function (Builder $query) use($data) {
            $query->where('name',$data);
        })->get()->count();

        return $count=$familyHeads+$familyMembers;
    }

    function generateReligionWiseGraph(){
        $data=[];
        $religions=Religion::pluck('name');
        foreach($religions as $religion){
            $religion=[$religion=>(int)FamilyHead::whereHas('religion',function (Builder $query) use($religion){
                $query->where('name',$religion);
            })->get()->count()];
            $data=$data+$religion;
        }
        $keys = array_keys((array) $data);
        $values = array_values((array) $data);
        
        return [
            'keys'=>$keys,
            'values'=>$values,
        ];

    }
    function generateEthnicWiseGraph(){
        $data=[];
        $ethnics=Ethnic::pluck('name');
        foreach($ethnics as $ethnic){
            $ethnic=[$ethnic=>(int)FamilyHead::whereHas('ethnic',function (Builder $query) use($ethnic){
                $query->where('name',$ethnic);
            })->get()->count()];
            $data=$data+$ethnic;
        }
        $keys = array_keys((array) $data);
        $values = array_values((array) $data);
        
        return [
            'keys'=>$keys,
            'values'=>$values,
        ];

    }
}
