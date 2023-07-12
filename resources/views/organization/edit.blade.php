@extends('layouts.master')
@section('title','add-occupation')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Organization Form</p>
    <a href="{{route('organization.index')}}" class="btn btn-primary btn-sm">Back</a>
    <Form action="{{route('organization.update',$organization->organization_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>organization:</label>
            <input type="text" name="name" id="" onkeypress="return isTextKey(event)" value="{{$organization->name}}"
                class="form-control">
        </div>
        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="description" id="" onkeypress="return isTextKey(event)"
                value="{{$organization->description}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile:</label>
            <input type="text" name="mobile" id="" onkeypress="return isNumberKey(event)"
                onblur="return phonenumber('mobile')" value="{{$organization->mobile}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Landline:</label>
            <input type="text" name="landline" id="" onkeypress="return isNumberKey(event)"
                onblur="return landphonenumber('landline')" value="{{$organization->landline_no}}" class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>

@endsection