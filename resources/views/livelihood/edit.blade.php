@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('livelihood.update')}}" method="POST">
        @csrf
        @method("PUT")
        <p class="h3">Edit Livelihood Form</p>
        <div class="form-group">
            <label>Assist Type:</label>
            <select class="form-control" name="assist_type">
                @foreach($assistTypes as $assistType)
                <option @if($livelihood->assist_type=='$assistType') selected @endif>{{$assistType}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <input type="text" name="start_date" class="form-control" id="" value="{{$livelihood->start_date}}">
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control" id=""
                value="{{$livelihood->amount}}">
        </div>
        <input type="hidden" name="livelihood_id" class="form-control" id="" value="{{$livelihood->livelihood_id}}">

        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection