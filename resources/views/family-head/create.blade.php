@extends('layouts.master')
@section('title','add-familyHead')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Family Form</p>
    <a href="" method="POST">Back</a>
    <Form action="{{route('familyHead.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>National Identity Card:</label>
            <input type="text" name="nic" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="dob" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Permenant Address:</label>
            <input type="text" name="p_address" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Temporary Address:</label>
            <input type="text" name="t_address" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>House No:</label>
            <input type="text" name="house_no" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Card Type:</label>
            <input type="text" name="card_type" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Internet:</label>
            <input type="text" name="internet" id="" class="form-control">
        </div>

        <div class="form-group">
            <label>Married Certificate No:</label>
            <input type="text" name="married_c_no" id="" class="form-control">
        </div>
        <!-- GN ID want to be hidden -->
        <label>GN ID</label>
        <input type="text" name="gn_id" id="" class="form-control">
        <div class="form-group">
            <label>Religion:</label>

            <select name="religion" class="form-control">
                <option>-- Choose occupation --</option>
                @foreach($religions as $religion)
                <option>{{$religion}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Ethnic:</label>
            <select name="ethnic" class="form-control">
                <option>-- Choose occupation --</option>
                @foreach($ethnics as $ethnic)
                <option>{{$ethnic}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Occupation:</label>
            <select name="occupation" class="form-control">
                <option>-- Choose occupation --</option>
                @foreach($occupations as $occupation)
                <option> {{$occupation}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection