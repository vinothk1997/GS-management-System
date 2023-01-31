@extends('layouts.master')
@section('title','add-staffWorkplaces')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Staff Form Form</p>
    <a href="{{route('staffWorkplace.index')}}">Back</a>
    <Form action="{{route('staffWorkplace.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>National Identy Card No:</label>
            <select name="nic" class="form-control">
                <option>Select NIC Number</option>
                @foreach($staffNICs as $staffNIC)
                <option>{{$staffNIC}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <input type="date" name="startDate" value="{{old('startDate')}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>National Identity Card No:</label>
            <input type="date" name="endDate" value="{{old('endDate')}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Designation:</label>
            <input type="text" name="designation" value="{{old('designation')}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Place ID:</label>
            <input type="text" name="placeId" value="{{old('placeId')}}" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection