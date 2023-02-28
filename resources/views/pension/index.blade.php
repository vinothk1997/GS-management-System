@extends('layouts.master')
@section('title','add-pension')
@section('content')
<p class="h3">Pension Table</p>
<a href="{{route('pension.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Pension No</th>
        <th>Bank</th>
        <th>Amount</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    @foreach($pensions as $pension)
    <tr>
        <td>{{$pension->pension_no}}</th>
        <td>{{$pension->bank}}</th>
        <td>{{$pension->amount}}</th>
        <td>{{$pension->category}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('pension.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="pension_id" value="{{$pension->pension_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('pension.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="pension_id" value="{{$pension->pension_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection