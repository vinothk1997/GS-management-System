@extends('layouts.master')
@section('title','edit-FamilyHead')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Vehicle Type Form</p>
    <Form action="{{route('familyHead.update')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" id="" class="form-control" value="{{$familyHead->first_name}}">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" id="" class="form-control" value="{{$familyHead->last_name}}">
        </div>
        <div class="form-group">
            <label>National Identity Card:</label>
            <input type="text" name="nic" id="" class="form-control" value="{{$familyHead->nic}}">
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="text" name="dob" id="" class="form-control" value="{{$familyHead->dob}}">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" id="" class="form-control" value="{{$familyHead->gender}}">
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" id="" class="form-control" value="{{$familyHead->mobile}}">
        </div>
        <div class="form-group">
            <label>Permenant Address:</label>
            <input type="text" name="p_address" id="" class="form-control" value="{{$familyHead->permanent_address}}">
        </div>
        <div class="form-group">
            <label>Temporary Address:</label>
            <input type="text" name="t_address" id="" class="form-control" value="{{$familyHead->temporary_address}}">
        </div>
        <div class="form-group">
            <label>House No:</label>
            <input type="text" name="house_no" id="" class="form-control" value="{{$familyHead->house_no}}">
        </div>
        <div class="form-group">
            <label>Card Type:</label>
            <input type="text" name="card_type" id="" class="form-control" value="{{$familyHead->card_type}}">
        </div>
        <div class="form-group">
            <label>Internet:</label>
            <input type="text" name="internet" id="" class="form-control" value="{{$familyHead->internet}}">
        </div>

        <div class="form-group">
            <label>Married Certificate No:</label>
            <input type="text" name="married_c_no" id="" class="form-control"
                value="{{$familyHead->married_certificate_no}}">
        </div>
        <label>Religion: </label>
        <select name="religion" class="form-control" value="{{$familyHead->fname}}">
            @foreach($religions as $religion)
            <option @if($religion) selected @endif>{{$religion}}</option>
            @endforeach
        </select>
        <label>Ethnic</label>
        <select name="ethnic" class="form-control" value="{{$familyHead->fname}}">
            @foreach($ethnics as $ethnic)
            <option @if($ethnic) selected @endif>{{$ethnic}}</option>
            @endforeach
        </select>
        <label>Occupation</label>
        <select name="occupation" class="form-control" value="{{$familyHead->fname}}">
            @foreach($occupations as $occupation)
            <option @if($religion) selected @endif>{{$occupation}}</option>
            @endforeach
        </select>
        <input type="hidden" name="familyId" value="{{$familyHead->family_id}}" />
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection