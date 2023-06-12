@extends('layouts.report')
@section('content')
<p class="h3">Working History Details</p>
<div style="background-color:white;">
    <table class="table my-3 w-auto table-bordered ">
        <caption class="mt-3"><b>Summary Details</b></caption>
        <tr>
            <td class='fw-bold'>Full Name: {{$staff->first_name}} {{$staff->last_name}}</td>
        </tr>
        <tr>
            <td class='fw-bold'>National Identity Card No: {{$staff->nic}}</td>
        </tr>
        <tr>
            <td class='fw-bold'>Date of Birth : {{$staff->dob}}</td>
        </tr>
        <tr>
            <td class='fw-bold'>Gender : {{$staff->gender}}</td>
        </tr>
        <tr>
            <td class='fw-bold'>Address: {{$staff->address}}</td>
        </tr>
        <tr>
            <td class='fw-bold'>Mobile : 0{{$staff->mobile}}</td>

        </tr>
    </table>
</div>

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
        <td>{{$staffWorkplace->name}}</th>
    </tr>
    @endforeach
</table>
@endsection
