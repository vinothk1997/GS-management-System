@extends('layouts.master')
@section('title','edit-occupation')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Occupation Form</p>
    <a href="{{route('occupation.index')}}" class="btn btn-primary btn-sm">Back</a>
    <Form action="{{route('occupation.update',$occupation->occupation_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Occupation:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" value="{{$occupation->name}}"
            class="form-control  @error('name') is-invalid @enderror">
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection