@extends('layouts.master')
@section('title','livelihoods')
@section('content')
<p class="h3">Livelihood Table</p>
<a href="{{route('livelihood.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Livelihood Id</th>
        <th>Start Date</th>
        <th>Amount</th>
        <th>Assist Type</th>
        <th>Action</th>
    </tr>
    @foreach($livelihoods as $livelihood)
    <tr>
        <td>{{$livelihood->livelihood_id}}</th>
        <td>{{$livelihood->start_date}}</th>
        <td>{{$livelihood->amount}}</th>
        <td>{{$livelihood->Assist_id}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('livelihood.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="livelihood_id" value="{{$livelihood->livelihood_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('livelihood.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="livelihood_id" value="{{$livelihood->livelihood_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection