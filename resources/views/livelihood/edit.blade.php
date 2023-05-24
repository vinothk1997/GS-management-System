@extends('layouts.master')
@section('title', 'add animal')
@section('content')
    <div class="container">
        <form class="d-inline" action="{{ route('livelihood.indexByFamilyHead') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $livelihood->family_id }}" name="family_id" />
            <input type="submit" class="btn btn-sm btn-primary" value="Back">
        </form>
        <Form action="{{ route('livelihood.update') }}" method="POST">
            @csrf
            @method('PUT')
            <p class="h3">Edit Livelihood Form</p>
            <div class="form-group">
                <label>Assist Type:</label>
                <select class="form-control" name="assist_type_id">
                    @foreach ($assistTypes as $assistType)
                        <option value="{{ $assistType->assist_type_id }}" @if ($livelihood->assist_type == $assistType->name) selected @endif>
                            {{ $assistType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Start Date:</label>
                <input type="text" name="start_date" class="form-control" id=""
                    value="{{ $livelihood->start_date }}">
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control"
                    id="" value="{{ $livelihood->amount }}">
            </div>
            <input type="hidden" name="livelihood_id" class="form-control" id=""
                value="{{ $livelihood->livelihood_id }}">
            <input type="hidden" name="family_id" class="form-control" id=""
                value="{{ $livelihood->livelihood_id }}">

            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

        </Form>
    </div>

@endsection
