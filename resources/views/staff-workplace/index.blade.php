@extends('layouts.master')
@section('title','vehicleType')
@section('content')
<p class="h3">Staff Workplaces</p>
<table class="table">
    <tr>
        <th>StaffId</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Designation</th>
        <th>Place Worked</th>
        <th>Action</th>
    </tr>
    @foreach($staffWorkplaces as $staffWorkplace)
    <tr>
        <td>{{$staffWorkplace->staff_id}}</th>
        <td>{{$staffWorkplace->start_date}}</th>
        <td>{{$staffWorkplace->end_date}}</th>
        <td>{{$staffWorkplace->designation}}</th>
        <td>{{$staffWorkplace->place_id}}</th>
        <td>
            <a href="{{route('staffWorkplace.show',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                class="btn btn-sm btn-success">View</a>
            <a href="{{route('staffWorkplace.edit',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                class="btn btn-sm btn-secondary">Edit</a>
            <form class="d-inline"
                action="{{route('staffWorkplace.destroy',[$staffWorkplace->staff_id,$staffWorkplace->start_date])}}"
                method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection