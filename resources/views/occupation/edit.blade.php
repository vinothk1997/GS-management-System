@extends('layouts.master')
@section('title','edit-ethnic')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Occupation Form</p>
    <Form action="{{route('occupation.update',$occupation->occupation_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Occupation:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" value="{{$occupation->name}}"
                class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection