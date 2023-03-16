@extends('layouts.master')
@section('title','add land')
@section('content')
<div class="container">
    <a href="{{route('land.index')}}">Back</a>

    <Form action="{{route('land.store')}}" method="POST">
        @csrf
        <p class="h3">Add Land Form</p>
        <div class="form-group">
            <label>Member Id:</label>
            <input type="text" name="member_id" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Land Type:</label>
            <select class="form-control" name="land_type">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Land GN Id:</label>
            <input type="text" name="land_gn_id" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Area (in perch):</label>
            <input type="text" name="area" onkeypress="return isNumberKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Reg.No:</label>
            <input type="text" name="reg_no" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Upload Documents:</label>
            <input type="file" name="document" class="form-control" id="" multiple>
        </div>
        <div>
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection