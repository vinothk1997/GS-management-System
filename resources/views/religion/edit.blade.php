@extends('layouts.master')
@section('title','edit-religion')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Occupation Form</p>
    <Form action="{{route('religion.update',$religion->religion_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Religion:</label>
            <input type="text" name="name" id="" onkeypress="return isTextKey(event)" value="{{$religion->name}}"
            class="form-control @error('name') is-invalid @enderror">
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection