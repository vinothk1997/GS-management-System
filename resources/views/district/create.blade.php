@extends('layouts.master')
@section('title','add-district')
@section('content')
<div class="container mt-3">
    <p class="h3">Add District Form</p>
    <a href="{{route('district.index')}}" class="btn btn-sm btn-primary"> Back</a>
    <Form action="{{route('district.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>District:</label>
            <input type="text" name="name" id="" onkeypress="return isTextKey(event)"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
    </Form>
</div>

@endsection