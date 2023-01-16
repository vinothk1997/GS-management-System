@extends('layouts.master')
@section('title','add-district')
@section('content')
<p class="h3">Add District Form</p>
<Form action="/districts/create" method="POST">
    <div class="form-group">
        <label>District:</label>
        <input type="text" name="name" id="" class="form-control">
    </div>
    <button type="submit">Add</button>
</Form>
@endsection