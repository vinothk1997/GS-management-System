@extends('layouts.master')
@section('title','edit-woking history')
@section('content')
<div class="container mt-3">
    <p class="h3">Edit Working Histrory</p>
    <a href="{{route('staff.show',$staffId)}}">Back</a>

    <Form action="{{route('staffWorkplace.update')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Designation:</label>
            <select class="form-control" name="designation" id="designation" onblur="loadDesignations();">
                <option>-- Choose designation --</option>
                @foreach($designations as $designation )
                <option>{{$designation}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label id="work_place">Work place :</label>
            <select class="form-control" name="workplace" id="workplace">
                <option> --choose work place </option>
                <div id="workplace"></div>
            </select>
            <input type="hidden" name="staff_id" value="{{$staffId}}" />
            <input type="hidden" name="start_date" value="{{$start_date}}" />
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>
<script>
function loadDesignations() {
    var designation = document.getElementById('designation').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var workplaceArray = [];
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('workplace').innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "/loadDesignation/" + designation, true);
    xhttp.send();
}
</script>
@endsection