@extends('layouts.master')
@section('title','familyHeads')
@section('content')
<p class="h3">Family Head Table</p>
<a href="{{route('familyHead.create')}}" class="btn btn-sm btn-primary my-2">Add New</a>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Family Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC</th>
            <th>Date of birth</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($familyHeads as $familyHead)
        <tr>
            <td>{{$familyHead->family_id}}</td>
            <td>{{$familyHead->first_name}}</td>
            <td>{{$familyHead->last_name}}</td>
            <td>{{$familyHead->nic}}</td>
            <td>{{$familyHead->dob}}</td>
            <td>{{$familyHead->gender}}</td>
            <td>
                <a href="{{route('familyHead.show',$familyHead->family_id)}}" class="btn btn-sm btn-success">View</a>
                <a href="{{route('familyHead.edit',$familyHead->family_id)}}" class="btn btn-sm btn-secondary">Edit</a>
                <form class=d-inline action="{{route('familyHead.destroy',$familyHead->family_id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endsection