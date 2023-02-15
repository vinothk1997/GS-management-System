@extends('layouts.master')
@section('title','add-staff')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Staff Form Form</p>
    <a href="{{route('staff.index')}}">Back</a>
    <Form action="{{route('staff.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" value="{{old('fname')}}" id=""
                class="form-control @error('fname') is-invalid @enderror">
            @error('fname')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" value="{{old('lname')}}" id=""
                class="form-control @error('lname') is-invalid @enderror">
            @error('lname')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>National Identity Card No:</label>
            <input type="text" name="nic" value="{{old('nic')}}" id=""
                class="form-control @error('nic') is-invalid @enderror">
            @error('nic')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="dob" value="{{old('dob')}}" id=""
                class="form-control @error('dob') is-invalid @enderror">
            @error('dob')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" value="{{old('gender')}}" id=""
                class="form-control @error('gender') is-invalid @enderror">
            @error('gender')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" value="{{old('address')}}" id=""
                class="form-control @error('address') is-invalid @enderror">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" value="{{old('mobile')}}" id=""
                class="form-control @error('mobile') is-invalid @enderror">
            @error('mobile')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection