@extends('layouts.master')
@section('title','add-district')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Division Form</p>
    <Form action="{{route('division.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Division:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div>
            <input type="hidden" name="districtId" value="{{$districtId}}">

        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection