@extends('layouts.master')
@section('title','edit-vehicleType')
@section('content')
<div class="container mt-3">
    <a class="btn btn-primary btn-sm" href="{{route('staff.index')}}">Back</a>
    <p class="h3">Add Vehicle Type Form</p>
    <Form action="{{route('staff.update',$staff->staff_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" onkeypress="return isTextKey(event)" value="{{$staff->first_name}}" id=""
                class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" onkeypress="return isTextKey(event)" value="{{$staff->last_name}}" id=""
                class="form-control">
        </div>
        <div class="form-group">
            <label>National Identity Card No:</label>
            <input type="text" name="nic" value="{{$staff->nic}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="dob" value="{{$staff->dob}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" value="{{$staff->gender}}" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" onkeypress="return isTextKey(event)" value="{{$staff->first_name}}" id=""
                class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" onkeypress="return isNumberKey(event)"
                onblur="return phonenumber('mobile')" value="{{$staff->mobile}}" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection