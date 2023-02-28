@extends('layouts.master')
@section('title','social services')
@section('content')
<p class="h3">Social Service Table</p>
<a href="{{route('socialService.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Social Service Id</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Year</th>
        <th>Action</th>
    </tr>
    @foreach($socialServices as $socialService)
    <tr>
        <td>{{$socialService->social_service_id}}</th>
        <td>{{$socialService->type}}</th>
        <td>{{$socialService->amount}}</th>
        <td>{{$socialService->year}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('socialService.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="social_service_id" value="{{$socialService->social_service_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('socialService.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="social_service_id" value="{{$socialService->social_service_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection