@extends('layouts.master')
@section('title','add-occupation')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Occupation Form</p>
    <a href="{{route('organization.index')}}" method="POST">Back</a>
    <Form action="{{route('organization.update',$organization->organization_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>organization:</label>
            <input type="text" name="name" id="" value="{{$organization->name}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="name" id="" value="{{$organization->description}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile:</label>
            <input type="text" name="name" id="" value="{{$organization->mobile}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Landline:</label>
            <input type="text" name="name" id="" value="{{$organization->landline_no}}" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection