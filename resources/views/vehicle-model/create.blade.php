@extends('layouts.master')
@section('title','add-vehicleBrand')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Model Form</p>
    <a href="{{route('vehicleModel.index')}}" method="POST">Back</a>
    <Form action="{{route('vehicleModel.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Vehicle Model:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <input type="hidden" name="brandId" id="" class="form-control" value="{{$brandId}}">
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>
@endsection