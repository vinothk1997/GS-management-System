@extends('layouts.master')
@section('title', 'add animal')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="d-inline" action="{{route('livelihood.indexByFamilyHead')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$family_id}}" name="family_id"/>
            <input type="submit" class="btn btn-sm btn-primary" value="Back">
        </form>
        <Form action="{{ route('livelihood.store') }}" method="POST">
            @csrf
            <p class="h3">Add Livelihood Form</p>
            <div class="form-group">
                <label>Assist Type:</label>
                <select class="form-control" name="assist_type_id">
                    @foreach ($assistTypes as $assistType)
                        <option value="{{ $assistType->assist_type_id }}">{{ $assistType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Start Date:</label>
                <input type="date" name="start_date" class="form-control" id="" value="">
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control"
                    id="" value="">
            </div>
            <input type="hidden" name="family_id" class="form-control" id="" value="{{ $family_id }}">

            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

        </Form>
    </div>

@endsection
