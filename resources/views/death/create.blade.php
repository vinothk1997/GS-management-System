@extends('layouts.master')
@section('title','add deaths')
@section('content')
<div class="container">
    <Form action="{{route('death.store')}}" method="POST">
        @csrf
        <p class="h3">Add Death Form</p>
        <div class="form-group">
            <label>Date of death:</label>
            <input type="date" name="death_date" class="form-control" id="">

        </div>
        <div class="form-group">
            <label>Place of death:</label>
            <input type="text" name="place" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Reason:</label>
            <textarea name="reason" id="" class="form-control" onkeypress="return isTextKey(event)" cols="30"
                rows="5"></textarea>
        </div>
        <div>
            <input type="text" name="member_id" placeholder="member id want to be loaded" value="">
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection