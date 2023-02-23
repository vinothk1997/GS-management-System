@extends('layouts.master')
@section('title','infrastructures')
@section('content')
<p class="h3">Infrastructure Table</p>
<a href="{{route('infrastructure.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Type of residence</th>
        <th>Type of house</th>
        <th>Type of roof</th>
        <th>Lightning</th>
        <th>Water</th>
        <th>Sanitary</th>
        <th>Action</th>
    </tr>
    @foreach($infrastructures as $infrastructure)
    <tr>
        <td>{{$infrastructure->type_of_residence}}</th>
        <td>{{$infrastructure->type_of_house}}</th>
        <td>{{$infrastructure->roof}}</th>
        <td class="text-capitalize">{{$infrastructure->lightning}}</th>
        <td class="text-capitalize">{{$infrastructure->water_facility}}</th>
        <td class="text-capitalize">{{$infrastructure->sanitary_facility}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('infrastructure.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="familyId" value="{{$infrastructure->family_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('infrastructure.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="familyId" value="{{$infrastructure->family_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection