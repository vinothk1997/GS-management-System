@extends('layouts.master')
@section('title','add-district')
@section('content')
<div class="container mt-3">
    <p class="h3">Add District Form</p>
    <a href="{{route('vehicleBrand.index')}}" method="POST">Back</a>
    <Form action="{{route('vehicleBrand.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Vehicle Brands:</label>
            <input type="text" name="brand" id="" onkeypress="return isTextKey(event)" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>
@endsection