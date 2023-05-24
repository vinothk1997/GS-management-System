@extends('layouts.master')
@section('title','edit-profile')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Profile Form</p>
    <a href="{{route('profile.showUserDetails')}}" class='btn btn-primary btn-sm my-3 px-4'>Go Back</a>
    <Form action="{{route('profile.updateProfileDetail')}}" method="POST">
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
            <label>Address:</label>
            <input type="text" name="address" onkeypress="return isTextKey(event)" value="{{$staff->first_name}}" id=""
                class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" onkeypress="return isNumberKey(event)"
                onblur="return phonenumber('mobile')" value="{{$staff->mobile}}" id="" class="form-control">
        </div>
        <button class="btn btn-sm btn-success my-2" type="submit">Update</button>
    </Form>
</div>
@endsection