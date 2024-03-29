@extends('layouts.master')
@section('title', 'add-assistType')
@section('content')
    <p class="h3">Donation Table</p>
    <div class="">

        <form class="d-inline" action="{{ route('familyHead.show') }}" method="GET">
            @csrf
            <input type="hidden" value="{{ $family_id }}" name="familyId" />
            <input type="submit" class="btn btn-sm btn-primary" value="Back">
        </form>
        @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
            <form class="d-inline" action="{{ route('donation.create') }}" method="GET">
                <input type="hidden" value="{{ $family_id }}" name="family_id" />
                <input type="submit" class="btn btn-sm btn-primary" value="Add Donation">
            </form>
        @endif
    </div>
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Organization</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Description</th>
        </tr>
        @foreach ($donations as $donation)
            <tr>
                <td>{{ $donation->date }}</th>
                <td>{{ $donation->organization }}</th>
                <td>{{ $donation->type }}</th>
                <td>{{ $donation->amount }}</th>
                <td>{{ $donation->description }}</th>
                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                <td>

                    <form class=d-inline action="{{ route('donation.edit') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="donation_id" value="{{ $donation->donation_id }}">
                        <input type="hidden" name="family_id" value="{{ $donation->family_id }}">
                        <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                    </form>

                </td>
        @endif
        </tr>
        @endforeach
    </table>
@endsection
