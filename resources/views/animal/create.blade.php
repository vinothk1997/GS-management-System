@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('animal.store')}}" method="POST">
        @csrf
        <p class="h3">Add Animal Form</p>
        <div class="form-group">
            <label>Type of Animal:</label>
            <select class="form-control" name="type_of_animal">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Number of Animals:</label>
            <input type="text" name="no_of_animal" class="form-control" id="no_of_animal"
                onkeypress="return isNumberKey(event)">
        </div>
        <div>
            <input type="text" name="familyId" placeholder="family id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection