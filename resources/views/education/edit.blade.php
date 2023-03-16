@extends('layouts.master')
@section('title','edit-education')
@section('content')
<div class="container mt-3">
    <p class="h3">Add District Form</p>
    <Form action="{{route('education.update',$education->education_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Education:</label>
            <input type="text" name="name" onkeypress="return isTextKey(event)" id="" value="{{$education->name}}"
                class="form-control">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection