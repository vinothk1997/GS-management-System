@extends('layouts.master')
@section('title', 'add animal')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="d-inline" action="{{route('donation.familyHeadDonationIndex')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$family_id}}" name="family_id"/>
            <input type="submit" class="btn btn-sm btn-primary" value="Back">
        </form>
        <Form action="{{ route('donation.store') }}" method="POST">
            @csrf
            <p class="h3">Add Donation Form</p>
            <div class="form-group">
                <label>Donated Date:</label>
                <input type="date" name="donated_date" class="form-control" id="">
            </div>

            <div class="form-group">
                <label>Organization:</label>
                <select class="form-control" name="organization">
                    @foreach ($organizations as $organization)
                        <option value="{{ $organization->organization_id }}">{{ $organization->name }}</option>
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
                <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control"
                    id="">
            </div>

            <div class="form-group">
                <label>Descrition:</label>
                <textarea class="form-control" name="description" onkeypress="return isTextKey(event)" rows="4"></textarea>
            </div>

            <div>
                <input type="hidden" name="familyId" placeholder="family id want to be loaded" value="{{ $family_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

        </Form>
    </div>

@endsection
