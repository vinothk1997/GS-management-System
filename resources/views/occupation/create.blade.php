@extends('layouts.master')
@section('title','add-occupation')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Occupation Form</p>
    <a href="{{route('occupation.index')}}" method="POST">Back</a>
    <Form action="{{route('occupation.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Occupation:</label>
            <input type="text" name="name" id="" onkeypress="return isTextKey(event)"
                class="form-control  @error('name') is-invalid @enderror">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection