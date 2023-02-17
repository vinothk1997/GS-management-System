@extends('layouts.master')
@section('title','familyHeads')
@section('content')
<p class="h3">Family Members Table</p>
<div class="my-3">

    <form class=d-inline action="{{route('familyMember.create')}}" method="GET">
        @csrf
        @method('GET')
        <input type="hidden" value="{{$familyId}}" name="familyId">
        <button type="submit" class="btn btn-sm btn-primary">Add New</a>
    </form>
</div>
<div>
    <p> Full Name:- {{$familyHead->first_name}} {{$familyHead->last_name}}</p>
    <p> National Identity Card:- {{$familyHead->nic}}</p>
    <p> Dateof Birth:- {{$familyHead->dob}}</p>
    <p> Gender:- {{$familyHead->gender}}</p>
    <p> Mobile:- {{$familyHead->mobile}}</p>
    <p> Permanent Address:- {{$familyHead->permanent_address}}</p>
    <p> Temporary Address:- {{$familyHead->temporary_address}}</p>
    <p> House No:- {{$familyHead->house_no}}</p>
    <p> Card Type:- {{$familyHead->card_type}}</p>
    <p> Interest:- {{$familyHead->internet}}</p>
    <p> Married Certificate No:- {{$familyHead->married_certificate_no}}</p>
    <p> Religion:- {{$religion}}</p>
    <p> Occupation:- {{$occupation}}</p>
    <p> Ethnic:- {{$ethnic}}</p>
</div>
<table id="member" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Member Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC</th>
            <th>Date of birth</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($familyMembers as $familyMember)
        <tr>
            <td>{{$familyMember->member_id}}</td>
            <td>{{$familyMember->first_name}}</td>
            <td>{{$familyMember->last_name}}</td>
            <td>{{$familyMember->nic}}</td>
            <td>{{$familyMember->dob}}</td>
            <td>{{$familyMember->gender}}</td>
            <td>
                <a href="{{route('familyMember.show',$familyMember->member_id)}}"
                    class="btn btn-sm btn-success">View</a>
                <form class=d-inline action="{{route('familyMember.edit')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="memberId" value="{{$familyMember->member_id}}">
                    <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                </form>
                <form class=d-inline action="{{route('familyMember.destroy')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="memberId" value="{{$familyMember->member_id}}">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#member').DataTable();
});
</script>
@endsection