@extends('layouts.master')
@section('title','edit-ethnic')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Ethnic  Form</p>
    <a href="{{route('ethnic.index')}}" class="btn btn-primary btn-sm">Back</a>
    <Form action="{{route('ethnic.update',$ethnic->ethnic_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Education:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" value="{{$ethnic->name}}"
            class="form-control @error('name') is-invalid @enderror">
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection