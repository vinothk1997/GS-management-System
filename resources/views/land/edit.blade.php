@extends('layouts.master')
@section('title', 'edit land')
@section('content')
    <div class="container">
        <Form action="{{ route('land.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p class="h3">Edit Land Form</p>
            <div class="form-group">
                <label>Member Id:</label>
                <input type="text" name="member_id" class="form-control" id="" value="{{ $land->member_id }}">
            </div>
            <div class="form-group">
                <label>Land Type:</label>
                <select class="form-control" name="land_type">
                    <option @if ($land->land_type == 'A') selected @endif>A</option>
                    <option @if ($land->land_type == 'B') selected @endif>B</option>
                    <option @if ($land->land_type == 'C') selected @endif>C</option>
                </select>
            </div>
            <div class="form-group">
                <label>Land GN Id:</label>
                <input type="text" name="land_gn_id" class="form-control" id="" value="{{ $land->land_gn_id }}">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" onkeypress="return isTextKey(event)" class="form-control"
                    id="" value="{{ $land->address }}">
            </div>
            <div class="form-group">
                <label>Area (in perch):</label>
                <input type="text" name="area" onkeypress="return isNumberKey(event)" class="form-control"
                    id="" value="{{ $land->area }}">
            </div>
            <div class="form-group">
                <label>Reg.No:</label>
                <input type="text" name="reg_no" class="form-control" id="" value="{{ $land->reg_no }}">
            </div>
            {{-- <div class="form-group">
                <label>Upload Documents:</label>
                <img src="{{ asset('storage/' .$land->document_file) }}" class="round" alt="Document Preview" width="50">
                <input type="file" name="document" class="form-control" id=""
                value="{{ $land->document_file }}">
            </div> --}}
            <div>
                <input type="hidden" name="family_id" placeholder="family id want to be loaded" value="">
                <input type="hidden" name="land_id" value="{{ $land->land_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

        </Form>
    </div>

@endsection
