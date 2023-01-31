@extends('layouts.master')
@section('title','add-district')
@section('content')
<div class="container mt-3">
    <p class="h3">Add District Form</p>
    <Form action="{{route('division.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Division:</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label>District:</label>
            <select name="district" id="" class="form-control">
                @foreach($districts as $district)
                <option>{{$district}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection