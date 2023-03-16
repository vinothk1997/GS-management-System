@extends('layouts.master')
@section('title','add pension')
@section('content')
<div class="container">
    <Form action="{{route('pension.store')}}" method="POST">
        @csrf
        <p class="h3">Add Pension Form</p>
        <div class="form-group">
            <label>Pension No:</label>
            <input type="text" name="pension_no" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Bank :</label>
            <select name="bank" class="form-control" id="">
                @foreach($categories as $category )
                <option @if($pension->category==$category)>{{$category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select name="category" class="form-control">
                <option>EPF</option>
                <option>Government</option>
            </select>
        </div>
        <input type="text" name="family_id" placeholder="family Id" class="form-control" id="">
        <input type="text" name="member_id" placehoder="member Id" class="form-control" id="">

        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection