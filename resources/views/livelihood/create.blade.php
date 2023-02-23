@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('livelihood.store')}}" method="POST">
        @csrf
        <p class="h3">Add Livelihood Form</p>
        <div class="form-group">
            <label>Assist Type:</label>
            <select class="form-control" name="assist_type">
                @foreach($assistTypes as $assistType)
                <option>{{$assistType}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <input type="date" name="start_date" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" class="form-control" id="">
        </div>
        <div>
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection