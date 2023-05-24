<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use DB;
use Illuminate\Support\Facades\Session;

class AnimalController extends Controller
{
    function index()
    {
        $animals = Animal::all();
        return view('animal.index', compact('animals'));
    }
 
    function create(Request $req)
    {
        $family_id = $req->family_id?$req->family_id:'FH/GN001/001';
        $animal_types = Animal::where('family_id',$family_id)->pluck('type_of_animal')->toArray();
        $animal_amounts=Animal::where('family_id',$family_id)->pluck('no_of_animal','type_of_animal')->toArray();
        // dd($animal_amounts);
        return view('animal.create', compact('family_id','animal_types','animal_amounts'));
    }
    function store(Request $req)
    {
        $animals = json_decode($req->input('animals'), true);
        $family_id = $req->familyId;
        // return $family_id;
        foreach ($animals as $animal) {
            if ($animal['status']=='checked' && !empty($animal['no_of_animal'])) {
                $obj=Animal::where('type_of_animal',$animal['type_of_animal'])
                ->where('family_id',$family_id);
                if ($obj->first() == null) {
                    $obj = Animal::create([
                        'family_id' => $family_id,
                        'type_of_animal' => $animal['type_of_animal'],
                        'no_of_animal' => $animal['no_of_animal'],
                    ]);
                } else {
                    $obj->update(
                        ['no_of_animal' => $animal['no_of_animal']]);
                }
            }
            elseif($animal['status']=='unchecked'){
                $obj=Animal::where('type_of_animal',$animal['type_of_animal'])->delete();
            }
        }
        return view('animal.animal-redirect', compact('family_id'));

    }
}