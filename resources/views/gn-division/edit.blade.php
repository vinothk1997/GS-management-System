@extends('layouts.master')
@section('title','edit-assist')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit GN Division Form</p>
    <Form action="{{route('gn.update',$gn->gn_id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>GN Division:</label>
            <input type="text" name="name" id="" class="form-control" value="{{$gn->name}}">
        </div>
        <div class="form-group">
            <label>Code:</label>
            <input type="text" name="code" id="" class="form-control" value="{{$gn->code}}">
        </div>
        <div class="form-group">
            <label>Division:</label>
            <select name="division" id="" class="form-control" value="{{$gn->division}}">
                @foreach($divisions as $division)
                <option value="{{$division}}">{{$division}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>
@endsection