@extends('layouts.report')
@section('content')
<table  style="width:100%">
        <tr>
            <th>StaffId</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Mobile</th>
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
        </tr>
        @endforeach
@endsection