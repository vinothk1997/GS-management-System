@extends('layouts.master')
@section('title','add-staffWorkplaces')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Staff Workplace Form</p>
    <a href="{{route('staff.show',$staffId)}}">Back</a>
    <Form action="{{route('staffWorkplace.store')}}" method="POST">
        @csrf
        <input type="hidden" name="staffId" value="{{$staffId}}">
        <div class="form-group">
            <label>Start Date:</label>
            <input type="date" name="startDate" value="{{old('startDate')}}" id=""
                class="form-control @error('startDate') is-invalid @enderror">
            @error('startDate')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>National Identity Card No:</label>
            <input type="date" name="endDate" value="{{old('endDate')}}" id=""
                class="form-control @error('endDate') is-invalid @enderror">
            @error('endDate')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Designation:</label>
            <input type="text" name="designation" onkeypress="return isTextKey(event)" value="{{old('designation')}}"
                id="" class="form-control @error('designation') is-invalid @enderror">
            @error('designation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Place ID:</label>
            <input type="text" name="placeId" value="{{old('placeId')}}" id=""
                class="form-control @error('placeId') is-invalid @enderror">
            @error('placeId')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection