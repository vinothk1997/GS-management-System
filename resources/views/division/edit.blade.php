@extends('layouts.master')
@section('title','edit-division')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Division Form</p>
    <Form action="{{route('division.update',$division->division_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Division:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" value="{{$division->name}}"
                class="form-control @error('name') is-invalid @enderror" >
        </div>
    
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection