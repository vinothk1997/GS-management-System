@extends('layouts.master')
@section('title', 'profile')
@section('content')
    <table class='table table-bordered w-auto bg-white'>
        <tr>
            <td>Full Name:- {{ $familyHead->first_name }} {{ $familyHead->last_name }}</td>
            <td>National Identity Card:- {{ $familyHead->nic }}</td>

        </tr>
        <tr>
            <td> Dateof Birth:- {{ $familyHead->dob }}</td>
            <td> Gender:- {{ $familyHead->gender }}</td>

        </tr>
        <tr>
            <td> Mobile:- {{ $familyHead->mobile }}</td>
            <td> Permanent Address:- 0{{ $familyHead->permanent_address }}</td>

        </tr>
        <tr>
            <td> Temporary Address:- {{ $familyHead->temporary_address }}</td>
            <td> House No:- {{ $familyHead->house_no }}</td>

        </tr>
        <tr>
            <td> Card Type:- {{ $familyHead->card_type }}</td>
            <td> Interest:- {{ $familyHead->internet }}</td>

        </tr>
        <tr>
            <td> Married Certificate No:- {{ $familyHead->married_certificate_no }}</td>
            <td> Religion:- {{ $religion }}</td>

        </tr>
        <tr>
            <td> Occupation:- {{ $occupation }}</td>
            <td>Ethnic:- {{ $ethnic }}</td>
        </tr>
    </table>
    <div>
        <a href="{{ route('profile.editProfileDetails') }}" class="btn btn-success px-5">Edit</a>
    </div>


@endsection
