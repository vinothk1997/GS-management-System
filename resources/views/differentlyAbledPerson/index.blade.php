@extends('layouts.master')
@section('title','add-assistType')
@section('content')
<p class="h3">Differently Abled Persons Table</p>
<a href="{{route('differentlyAbledPerson.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Type of Disability</th>
        <th>Date</th>
        <th>Reason</th>
        <th>Monthly Assist</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>
    @foreach($differentlyAbledPersons as $differentlyAbledPerson)
    <tr>
        <td>{{$differentlyAbledPerson->type}}</th>
        <td>{{$differentlyAbledPerson->date}}</th>
        <td>{{$differentlyAbledPerson->reason}}</th>
        <td>{{$differentlyAbledPerson->monthly_assist}}</th>
        <td>{{$differentlyAbledPerson->amount}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('differentlyAbledPerson.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{$differentlyAbledPerson->id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('differentlyAbledPerson.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$differentlyAbledPerson->id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection