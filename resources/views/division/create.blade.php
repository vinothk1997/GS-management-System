@extends('layouts.master')
@section('title','add-district')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Division Form</p>
    <a class="btn btn-sm btn-primary" href="/districts/{{$districtId}}/show">Back</a>
    <Form action="{{route('division.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Division:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id=""
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="hidden" name="districtId" value="{{$districtId}}">

        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection