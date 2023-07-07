@extends('layouts.master')
@section('title', 'add-district')
@section('content')
    <div class="container mt-3">
        <a href="{{ route('assistType.index') }}" method="POST">Back</a>
        <Form action="{{ route('assistType.store') }}" method="POST">
            @csrf
            <p class="h3">Add District Form</p>
            <div class="form-group">
                <label>Assist Type:</label>
                <input type="text" name="name" id="" onkeypress="return isTextKey(event)" class="form-control">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

        </Form>
    </div>

@endsection
