@extends('layouts.master')
@section('title','add-death')
@section('content')
<p class="h3">Deaths Table</p>
<a href="{{route('death.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Date of death</th>
        <th>Place</th>
        <th>Reason</th>
        <th>Action</th>
    </tr>
    @foreach($deaths as $death)
    <tr>
        <td>{{$death->death_date}}</th>
        <td>{{$death->place}}</th>
        <td>{{$death->reason}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('death.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="death_id" value="{{$death->death_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('death.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="death_id" value="{{$death->death_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection