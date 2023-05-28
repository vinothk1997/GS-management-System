@extends('layouts.report')
@section('content')
    <div style="width:100%;" id=''>
        <table class="table">
            <tr>
                <td><b>Full Name:</b></td>
                <td>{{ $familyHead->first_name }} {{ $familyHead->last_name }}</td>
                <td><b>Date of Birth:-</b></td>
                <td>{{ $familyHead->nic }}</td>
            </tr>
            <tr>
                <td><b>Mobile:-</b> </td>
                <td> {{ $familyHead->mobile }}</td>
                <td><b>Permanent Address:-</b></td>
                <td>{{ $familyHead->permanent_address }}</td>
            </tr>
            <tr>
                <td><b>House No:-</b></td>
                <td>{{ $familyHead->house_no }}</td>
                <td> <b>Interest:- </b> </td>
                <td>{{ $familyHead->internet }}</td>
            </tr>
            <tr>
                <td><b> Card Type:-</b> </td>
                <td>{{ $familyHead->card_type }}</td>
                <td><b> Married Certificate No:-</b> </td>
                <td>{{ $familyHead->married_certificate_no }}</td>
            </tr>
            <tr>
                <td><b> Religion:- </b></td>
                <td>{{ $religion }}</td>
                <td> <b> Occupation:-</b> </td>
                <td>{{ $occupation }}</td>
            </tr>
            <tr>
                <td> <b>Ethnic:-</b></td>
                <td> {{ $ethnic }}</td>
            </tr>
        </table>
    </div>
    <div>
        <h3>Family Members Detail</h3>
    </div>
    <table style="width:100%">
        <tr>
            <td><b>Member Id</b></td>
            <td><b>First Name</b></td>
            <td><b>Last Name</b></td>
            <td><b>National Identity Card </b></td>
            <td><b>Date of birth</b></td>
            <td><b>Gender</b></td>
        </tr>
        @foreach ($familyMembers as $familyMember)
            <tr>
                <td>{{ $familyMember->member_id }}</td>
                <td>{{ $familyMember->first_name }}</td>
                <td>{{ $familyMember->last_name }}</td>
                <td>{{ $familyMember->nic }}</td>
                <td>{{ $familyMember->dob }}</td>
                <td>{{ $familyMember->gender }}</td>
            </tr>
        @endforeach
    </table>
@endsection
