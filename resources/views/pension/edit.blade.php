@extends('layouts.master')
@section('title','add pension')
@section('content')
<div class="container">
    <Form action="{{route('pension.store')}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h3">Edit Pension Form</p>
        <div class="form-group">
            <label>Pension No:</label>
            <input type="text" name="pension_no" class="form-control" id="" value="{{$pension->pension_no}}">
        </div>
        <div class="form-group">
            <label>Bank :</label>
            <select name="bank" class="form-control" id="">
                @foreach($banks as $bank )
                <option @if($pension->bank==$bank) selected @endif>{{$bank}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control" id=""
                value="{{$pension->amount}}">
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select name="category" class="form-control">
                <option @if($pension->category=='EPF') selected @endif >EPF</option>
                <option @if($pension->category=='Government') selected @endif >Government</option>
            </select>
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection