@extends('layouts.master')
@section('title','vehicleType')
@section('content')
<p class="h3">Working History Details</p>
<a href="{{route('staff.index')}}" class="">Go Back</a>
<a href="{{route('staffWorkplace.create',$staffId)}}" class="btn btn-primary btn-sm px-4">Add</a>
<table class="table my-3 w-auto table-borderless ">
    <h5 class="mt-3">Summary Details</h5>
    <tr>
        <td>First Name</td>
        <td>{{$staff->first_name}}</td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td>{{$staff->last_name}}</td>

    </tr>
    <tr>
        <td>National Identity Card No</td>
        <td>{{$staff->nic}}</td>

    </tr>
    <tr>
        <td>Date of Birth</td>
        <td>{{$staff->dob}}</td>

    </tr>
    <tr>
        <td>Gender</td>
        <td>{{$staff->gender}}</td>

    </tr>
    <tr>
        <td>Address</td>
        <td>{{$staff->address}}</td>

    </tr>
    <tr>
        <td>Mobile</td>
        <td>0{{$staff->mobile}}</td>

    </tr>
    <tr>
        @if($staff->status=='active')
        <td>
            <a href="{{route('staff.edit',$staff->staff_id)}}" class=" btn btn-success w-100">Edit Staff</a>

        </td>
        @endif
    </tr>
</table>
<table class="table">
    <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Designation</th>
        <th>Place Worked</th>
    </tr>
    @foreach($staffWorkplaces as $staffWorkplace)
    <tr>
        <td>{{$staffWorkplace->start_date}}</th>
        <td>{{$staffWorkplace->end_date}}</th>
        <td>{{$staffWorkplace->designation}}</th>
        <td>{{$staffWorkplace->place_id}}</th>
        <td>
            <a href="{{route('staffWorkplace.show',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                class="btn btn-sm btn-success">View</a>
            <a href="{{route('staffWorkplace.edit',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline"
                action="{{route('staffWorkplace.destroy',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection