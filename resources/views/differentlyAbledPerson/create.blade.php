@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('differentlyAbledPerson.store')}}" method="POST">
        @csrf
        <p class="h3">Add Animal Form</p>
        <div class="form-group">
            <label>Type of Disability:</label>
            <select class="form-control" name="type">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Reason:</label>
            <input type="text" name="reason" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Monthly Assist:</label>
            <input type="text" name="monthly_assist" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" class="form-control" id="">
        </div>
        <div>
            <input type="text" name="member_id" placeholder="member id want to be loaded" value="">
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection