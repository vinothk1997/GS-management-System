@extends('layouts.master')
@section('title','add-gn-division')
@section('content')
<div class="container mt-3">
    <Form action="{{route('gn.store')}}" method="POST">
        @csrf
        <p class="h3">Add GN Division Form</p>
        <div class="form-group">
            <label>GN Division:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>Code:</label>
            <input type="text" name="code" id="" class="form-control">
        </div>
        <div>
            <input type="hidden" name="divisionId" value="{{$divisionId}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection