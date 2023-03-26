@extends('layouts.master')
@section('title','vehicleType')
@section('content')
<p class="h3">Staffs</p>
<a href="{{route('staff.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>StaffId</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>NIC</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Action</th>
    </tr>
    @foreach($staffs as $staff)
    <tr>
        <td>{{$staff->staff_id}}</th>
        <td>{{$staff->first_name}}</th>
        <td>{{$staff->last_name}}</th>
        <td>{{$staff->nic}}</th>
        <td>{{$staff->dob}}</th>
        <td>{{$staff->gender}}</th>
        <td>{{$staff->address}}</th>
        <td>0{{$staff->mobile}}</th>
        <td>
            <a href="{{route('staff.show',$staff->staff_id)}}" class="btn btn-sm btn-success">View</a>
            @if($staff->status=='active')
            <a href="{{route('staff.edit',$staff->staff_id)}}" class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline" action="{{route('staff.destroy',$staff->staff_id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection