@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('differentlyAbledPerson.update')}}" method="POST">
        @csrf
        @method('PUT')
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
            <input type="date" name="date" class="form-control" id="" value="{{$differentlyAbledPerson->date}}">
        </div>
        <div class="form-group">
            <label>Reason:</label>
            <input type="text" name="reason" onkeypress="return isTextKey(event)" class="form-control" id=""
                value="{{$differentlyAbledPerson->reason}}">
        </div>
        <div class="form-group">
            <label>Monthly Assist:</label>
            <input type="text" name="monthly_assist" onkeypress="return isNumberKey(event)" class="form-control" id=""
                value="{{$differentlyAbledPerson->monthly_assist}}">
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control" id=""
                value="{{$differentlyAbledPerson->amount}}">
        </div>
        <div>
            <input type="hidden" name="id" value="{{$differentlyAbledPerson->id}}">
        </div>
        <button class=" btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection