<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use DB;

class AnimalController extends Controller
{
    function index(){
        $animals=Animal::all();
        return view('animal.index',compact('animals'));
    }
    function create(){
        return view('animal.create');
    }
    function store(Request $req){
        // return $req;
        $animal=new Animal;
        $animal->family_id=$req->familyId;
        $animal->type_of_animal=$req->type_of_animal;
        $animal->no_of_animal=$req->no_of_animal;
        $animal->save();
        return view('animal.index');
    }
    function show(){
        return view('district.index');
    }
    function edit(Request $req){
         $animal=Animal::where('family_id',$req->familyId)->where('type_of_animal',$req->typeOfAnimal)->first();
        return view('animal.edit',compact('animal'));
    }
    function update(Request $req){
         $animal=DB::table('animals')
         ->where('family_id',$req->familyId)
         ->where('type_of_animal',$req->type)
         ->update([
            // 'no_of_animal'=>$req->noOfAnimal,
            'type_of_animal'=> $req->typeOfAnimal,
         ]);
         return redirect()->route('animal.index');
    }
    function destroy($assist){
        $assist= AssistType::destroy($assist);
        return redirect()->route('assistType.index');
    }
}