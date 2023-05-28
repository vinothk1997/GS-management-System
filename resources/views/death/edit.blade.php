@extends('layouts.master')
@section('title','add deaths')
@section('content')
<div class="container">
    <form action="{{ route('familyMember.show') }}">
        <input type="hidden" name="memberId" value="{{ $member_id }}">
        <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
    </form>
    <Form action="{{route('death.update')}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h3">Edit Death Form</p>
        <div class="form-group">
            <label>Date of death:</label>
            <input type="date" name="death_date" class="form-control" id="" value="{{$death->death_date}}">

        </div>
        <div class="form-group">
            <label>Place of death:</label>
            <input type="text" name="place" onkeypress="return isTextKey(event)" class="form-control" id=""
                value="{{$death->place}}">
        </div>
        <div class="form-group">
            <label>Reason:</label>
            <textarea name="reason" id="" class="form-control" onkeypress="return isTextKey(event)" cols="30"
                rows="5">{{$death->reason}}</textarea>
        </div>
        <input type="hidden" name="death_id" value="{{$death->death_id}}">
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection