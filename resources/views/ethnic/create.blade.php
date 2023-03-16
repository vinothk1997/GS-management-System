@extends('layouts.master')
@section('title','add-education')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Ethnic Form</p>
    <a href="{{route('ethnic.index')}}" method="POST">Back</a>
    <Form action="{{route('ethnic.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Ethnic:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id=""
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection