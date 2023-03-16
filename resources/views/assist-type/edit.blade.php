@extends('layouts.master')
@section('title','edit-assist')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit District Form</p>
    <Form action="{{route('assistType.update',$assistType->assist_type_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Assist Type:</label>
            <input type="text" name="name" id="" onkeypress="return isTextKey(event)" value="{{$assistType->name}}"
                class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection