@extends('layouts.master')
@section('title','edit-vehicleBrand')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Vehicle Brand Form</p>
    <a href="{{route('vehicleBrand.index')}}" method="POST">Back</a>
    <Form action="{{route('vehicleBrand.update',$vehicleBrand->brand_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Vehicle Brand:</label>
            <input type="text" name="brand" id="" onkeypress="return isTextKey(event)" value="{{$vehicleBrand->brand}}"
            class="form-control @error('brand') is-invalid @enderror">
        </div>
        @error('brand')
        <div class="text-danger">{{ $message }}</div>
         @enderror
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection