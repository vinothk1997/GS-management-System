@extends('layouts.report')
@section('content')
    <h3 >Family Head Table</h3>
    <table  style="width:100%">
        <tr>
            <td><b>Family Id</b></td>
            <td><b>First Name</b></td>
            <td><b>Last Name</b></td>
            <td><b>NIC</b></td>
            <td><b>Date of birth</b></td>
            <td><b>Gender</b></td>
        </tr>
        @foreach ($familyHeads as $familyHead)
            <tr>
                <td>{{ $familyHead->family_id }}</td>
                <td>{{ $familyHead->first_name }}</td>
                <td>{{ $familyHead->last_name }}</td>
                <td>{{ $familyHead->nic }}</td>
                <td>{{ $familyHead->dob }}</td>
                <td>{{ $familyHead->gender }}</td>
            </tr>
        @endforeach
    </table>
@endsection
