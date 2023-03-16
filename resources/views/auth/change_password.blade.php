@extends('layouts.master')
@section('title','forget_change_password')
@section('content')
<div class="w-100 d-flex justify-content-center align-items-center">
    <form class="h-100">
        <div>
            <label class="form-label">User Name:</label>
            <input type="text" id="user_name" class="form-control">
        </div>
        <div>
            <label class="form-label">Current Password:</label>
            <input type="text" id="user_name" class="form-control">
        </div>
        <div>
            <label class="form-label">New Password:</label>
            <input type="text" id="password" class="form-control">
        </div>
        <div>
            <label class="form-label">Confirm Password:</label>
            <input type="text" id="confirm_password" class="form-control">
        </div>
        <div class="my-3">
            <a href="" name="clear" class="btn btn-primary px-5 ">Clear</a>
            <a href="" name="changePassword" class="btn btn-success ms-3 px-5">Change password</a>
        </div>
    </form>
</div>
@endsection