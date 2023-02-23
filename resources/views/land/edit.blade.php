@extends('layouts.master')
@section('title','edit land')
@section('content')
<div class="container">
    <Form action="{{route('land.update')}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h3">Edit Land Form</p>
        <div class="form-group">
            <label>Member Id:</label>
            <input type="text" name="member_id" class="form-control" id="" value="{{$land->member_id}}">
        </div>
        <div class="form-group">
            <label>Land Type:</label>
            <select class="form-control" name="land_type">
                <option @if($land->land_type=='A')selected @endif>A</option>
                <option @if($land->land_type=='B')selected @endif>B</option>
                <option @if($land->land_type=='C')selected @endif>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Land GN Id:</label>
            <input type="text" name="land_gn_id" class="form-control" id="" value="{{$land->land_gn_id}}">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" class="form-control" id="" value="{{$land->address}}">
        </div>
        <div class="form-group">
            <label>Area:</label>
            <input type="text" name="area" class="form-control" id="" value="{{$land->area}}">
        </div>
        <div class="form-group">
            <label>Reg.No:</label>
            <input type="text" name="reg_no" class="form-control" id="" value="{{$land->reg_no}}">
        </div>
        <div class="form-group">
            <label>Upload Documents:</label>
            <input type="file" name="document" class="form-control" id="" value="">
        </div>
        <div>
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
            <input type="hidden" name="land_id" value="{{$land->land_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection