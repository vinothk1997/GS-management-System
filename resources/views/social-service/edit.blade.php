@extends('layouts.master')
@section('title','edit social service')
@section('content')
<div class="container">
    <Form action="{{route('socialService.update')}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h3">Add Animal Form</p>
        <div class="form-group">
            <label>Type of Social Service:</label>
            <select class="form-control" name="type">
                <option @if($socialService->type=="A") selected @endif)>A</option>
                <option @if($socialService->type=="B") selected @endif>B</option>
                <option @if($socialService->type=="C") selected @endif>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" class="form-control" id="" onkeypress="return isNumberKey(event)"
                value="{{$socialService->amount}}">
        </div>
        <div class="form-group">
            <label>Year:</label>
            <input type="number" min="2000" max="2099" name="year" onkeypress="return isNumberKey(event)"
                class="form-control" id="" value="{{$socialService->year}}">
        </div>
        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="description" onkeypress="return isTextKey(event)" class="form-control" id=""
                value="{{$socialService->description}}">
        </div>
        <div>
            <input type="hidden" name="social_service_id" value="{{$socialService->social_service_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>

@endsection