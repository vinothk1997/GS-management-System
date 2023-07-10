@extends('layouts.master')
@section('title', 'add tree')
@section('content')
    <div class="container">
        <a href="/lands/show?land_id={{ $land_id }}" class="btn btn-sm btn-primary">Back</a>
        <Form action="{{ route('tree.store') }}" method="POST">
            @csrf
            <p class="h3">Add Tree Form</p>
            <div class="form-group">
                @php
                    $tree_types = ['Small', 'Big',];
                @endphp
                <label>Type of Tree:</label>
                <select class="form-control" name="tree_type">
                    @foreach ($tree_types as $obj)
                        <option value="{{ $obj }}">{{ $obj }}</option>
                    @endforeach()
                </select>
            </div>

            <div class="form-group">
                @php
                    $tree_types = ['Apple', 'Mango','Banana'];
                @endphp
                <label>Tree Name:</label>
                <select class="form-control" name="tree_name">
                    @foreach ($tree_types as $obj)
                        <option value="{{ $obj }}">{{ $obj }}</option>
                    @endforeach()
                </select>
            </div>

            <div class="form-group">
                <label>Number of Tree:</label>
                <input type="text" name="no_of_tree" onkeypress="return isNumberKey(event)" class="form-control"
                    id="">
            </div>
            <div>
                <input type="hidden" name="land_id" placeholder="land id want to be loaded" value="{{ $land_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

        </Form>
    </div>

@endsection
