@extends('layouts.master')
@section('title', 'edit animal')
@section('content')
    <div class="container">
        <Form action="{{ route('donation.update') }}" method="POST">
            @csrf
            @method('PUT')
            <p class="h3">Edit Donation Form</p>
            <div class="form-group">
                <label>Donated Date:</label>
                <input type="date" name="donated_date" class="form-control" id="" value="{{ $donation->date }}" readonly>
            </div>
            <div class="form-group">
                <label>Organization:</label>
                <select class="form-control" name="organization">
                    @foreach ($organizations as $organization)
                        <option value="{{ $organization->organization_id }}"
                            @if ($donation->organization == $organization->name) selected @endif>{{ $organization->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Donation Type:</label>
                <select class="form-control" name="donation_type">
                    <option @if ($donation->type == 'asset') selected @endif>Asset</option>
                    <option @if ($donation->type == 'cash') selected @endif>Cash</option>
                </select>
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control"
                        id="" value="{{ $donation->amount }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" onkeypress="return isTextKey(event)" rows="4">{{ $donation->description }}</textarea>
                </div>
            </div>
            <div>
                <input type="hidden" name="familyId" placeholder="family id want to be loaded" value="{{ $family_id }}">
                <input type="hidden" name="donation_id" placeholder="donation id want to be loaded"
                    value="{{ $donation->donation_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

        </Form>
    </div>

@endsection
