@extends('layouts.master')
@section('title','add-staffWorkplaces')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Staff Workplace Form</p>
    <a href="{{route('staff.show',$staffId)}}">Back</a>
    <Form action="{{route('staffWorkplace.store')}}" method="POST">
        @csrf
        <input type="hidden" name="staffId" value="{{$staffId}}">
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