@extends('layouts.master')
@section('title','add-district')
@section('content')
<div class="container mt-3">
    <p class="h3">Add District Form</p>
    <Form action="{{route('district.update',$district->district_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>District:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" value="{{$district->name}}"
                class="form-control @error('name') is-invalid @enderror">
                @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection