@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('donation.store')}}" method="POST">
        @csrf
        <p class="h3">Add Animal Form</p>
        <div class="form-group">
            <label>Donated Date:</label>
            <input type="date" name="donated_date" class="form-control" id="">
        </div>

        <div class="form-group">
            <label>Organization:</label>
            <select class="form-control" name="organization">
                @foreach($organizations as $organization)
                <option>{{$organization}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Donation Type:</label>
            <select class="form-control" name="donation_type">
                <option>Asset</option>
                <option>Cash</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" class="form-control" id="">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" rows="4"></textarea>
        </div>

        <div>
            <input type="text" name="familyId" placeholder="family id want to be loaded" value="">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection