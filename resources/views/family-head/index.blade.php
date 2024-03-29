@extends('layouts.master')
@section('title','familyHeads')
@section('content')
<p class="h3">Family Head Table</p>
@if(Session::get('user') &&Session::get('user')['user_type']!='family head')
<a href="{{route('familyHead.create')}}" class="btn btn-sm btn-primary my-2">Add New</a>
<a href="{{route('report.generateFamilyHeadListReport')}}" class="btn btn-sm btn-primary my-2" target="_blank">Generate Report</a>
@endif
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
                <form class="d-inline me-1" action="{{route('familyHead.show')}}" method="GET">
                    @csrf
                    @method('GET')
                    <input type="hidden" name="familyId" value="{{$familyHead->family_id}}" />
                    <button type="submit" class="btn btn-sm btn-primary">View</a>
                </form>
                @if(Session::get('user') &&Session::get('user')['user_type']!='family head')
                @if($familyHead->status=='active')
                <form class="d-inline" action="{{route('familyHead.edit')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="familyId" value="{{$familyHead->family_id}}" />
                    <button type="submit" class="btn btn-sm btn-secondary mx-2">Edit</a>
                </form>
                <form class="d-inline" action="{{route('familyHead.destroy')}}" method="POST">
                    @csrf
                    <input type="hidden" name="familyId" value="{{$familyHead->family_id}}">
                    @method('DELETE') <button type="submit" onclick="return deletedata()"
                        class="btn btn-sm btn-danger">Delete</a>
                </form>
                @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable();
});
table
    .order([1, 'desc'])
    .draw();
</script>
@endsection