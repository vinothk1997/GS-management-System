@extends('layouts.master')
@section('title', 'add tree')
@section('content')
    <div class="container">
        <Form action="{{ route('tree.update') }}" method="POST">
            @csrf
            @method('PUT')
            <p class="h3">Edit Tree Form</p>
            <div class="form-group">
                @php
                    $trees = ['Small','Big'];
                @endphp
                <label>Type of Tree:</label>
                <select class="form-control" name="tree_type">
                    @foreach ($trees as $obj)
                        <option value="{{ $obj }}" @if ($tree->tree_type == $obj) selected @endif>{{ $obj }}</option>
                    @endforeach()
                </select>
            </div>
            <div class="form-group">
                @php
                    $tree_names = ['Apple', 'Mango', 'Banana'];
                @endphp
                <label>Tree Name:</label>
                <select class="form-control" name="tree_name">
                    @foreach ($tree_names as $obj)
                        <option value="{{ $obj }}" @if ($tree->tree_name == $obj) selected @endif>{{ $obj }}</option>
                    @endforeach()
                </select>
            </div>
            <div class="form-group">
                <label>Number of Tree:</label>
                <input type="text" name="no_of_tree" class="form-control" id="" value="{{ $tree->no_of_tree }}">
            </div>
            <div>
                <input type="hidden" name="land_id" placeholder="land id want to be loaded" value="{{ $tree->land_id }}">
                <input type="hidden" name="old_tree_name" placeholder="land id want to be loaded" value="{{ $tree->tree_name }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

        </Form>
    </div>

@endsection
