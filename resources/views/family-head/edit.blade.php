@extends('layouts.master')
@section('title','edit-vehicleType')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Vehicle Type Form</p>
    <Form action="{{route('vehicleType.update',$vehicleType->vehicle_type_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>National Identity Card:</label>
            <input type="text" name="nic" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="text" name="dob" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Permenant Address:</label>
            <input type="text" name="p_address" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Temporary Address:</label>
            <input type="text" name="t_address" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>House No:</label>
            <input type="text" name="house_no" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Card Type:</label>
            <input type="text" name="card_type" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Internet:</label>
            <input type="text" name="internet" id="" class="form-control">
        </div>

        <div class="form-group">
            <label>Married Certificate No:</label>
            <input type="text" name="maried_c_no" id="" class="form-control">
        </div>
        <select name="religion" class="form-group">
            <option>Choose religion</option>
        </select>
        <select name="ethnic" class="form-group">
            <option>"Choose religion"</option>
        </select>
        <select name="occupation" class="form-group">
            <option> Choose occupation</option>
        </select>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection