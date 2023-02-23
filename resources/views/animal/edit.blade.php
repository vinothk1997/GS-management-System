@extends('layouts.master')
@section('title','edit animal')
@section('content')
<div class="container">
    <Form action="{{route('animal.update')}}" method="POST">
        @csrf
        @method("PUT")
        <p class="h3">Add Animal Form</p>
        <div class="form-group">
            <label>Type of Animal:</label>
            <select class="form-control" name="typeOfAnimal">
                <option @if($animal->type_of_animal=='A')selected @endif)>A</option>
                <option @if($animal->type_of_animal=='B')selected @endif)>B</option>
                <option @if($animal->type_of_animal=='C')selected @endif)>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Number of Animals:</label>
            <input type="text" name="noOfAnimal" class="form-control" id="" value="{{$animal->no_of_animal}}">
        </div>
        <div>
            <!-- want to change to hidden values -->
            <input type="text" name="familyId" placeholder="family id want to be loaded" value="{{$animal->family_id}}">
            <input type="text" name="type" placeholder="family id want to be loaded"
                value="{{$animal->type_of_animal}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection