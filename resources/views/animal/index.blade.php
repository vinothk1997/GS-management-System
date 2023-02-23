@extends('layouts.master')
@section('title','add-assistType')
@section('content')
<p class="h3">GN-Division Table</p>
<a href="{{route('animal.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Type of Animal</th>
        <th>Number of animal</th>
        <th>Action</th>
    </tr>
    @foreach($animals as $animal)
    <tr>
        <td>{{$animal->type_of_animal}}</th>
        <td>{{$animal->no_of_animal}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('animal.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="familyId" value="{{$animal->family_id}}">
                <input type="hidden" name="typeOfAnimal" value="{{$animal->type_of_animal}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('animal.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="familyId" value="{{$animal->family_id}}">
                <input type="hidden" name="typeOfAnimal" value="{{$animal->type_of_animal}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection