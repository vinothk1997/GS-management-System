@extends('layouts.master')
@section('title','profile')
@section('content')
<table class="table my-3 w-auto table-bordered bg-white ">
    <h5 class="mt-3">Summary Details</h5>
    <tr>
        <td>First Name:{{$staff->first_name}}</td>
        <td>Last Name:{{$staff->last_name}}</td>
    </tr>
    <tr>
        <td>Date of Birth: {{$staff->dob}}</td>
        <td>National Identity Card No:{{$staff->nic}}</td>

    </tr>
    <tr>
        <td>Gender: {{$staff->gender}}</td>
        <td>Address:{{$staff->address}}</td>
    </tr>
    <tr>
        <td>Mobile: 0{{$staff->mobile}}</td>

    </tr>

</table>
<div>
    <a href="{{route('profile.editProfileDetails')}}" class="btn btn-success px-5">Edit</a>
</div>
@endsection