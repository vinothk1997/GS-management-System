@extends('layouts.master')
@section('title','add social service')
@section('content')
<div class="container">
    <Form action="{{route('socialService.store')}}" method="POST">
        @csrf
        <p class="h3">Add Animal Form</p>
        <div class="form-group">
            <label>Type of Social Service:</label>
            <select class="form-control" name="type">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Year:</label>
            <input type="number" min="2000" max="2099" name="year" onkeypress="return isNumberKey(event)"
                class="form-control" id="" value="2020">

        </div>
        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="description" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div>
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
            <input type="text" name="member_id" placeholder="member id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection