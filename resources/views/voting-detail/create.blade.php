@extends('layouts.master')
@section('title','add voting details')
@section('content')
<div class="container">
    <Form action="{{route('votingDetail.store')}}" method="POST">
        @csrf
        <p class="h3">Add Voting Detail Form</p>
        <div class="form-group">
            <label>Vote No:</label>
            <input type="text" name="vote_no" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Year:</label>
            <input type="text" name="year" onkeypress="return isNumberKey(event)" class="form-control" id="">
        </div>

        <div>
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
            <input type="text" name="member_id" placeholder="Member id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection