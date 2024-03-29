@extends('layouts.master')
@section('title', 'add animal')
@section('content')
    <div class="container">
        @if($family_member_id)
        <form action="{{ route('familyMember.show') }}">
            <input type="hidden" name="memberId" value="{{ $family_member_id  }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        @elseif($family_id)
        <form action="{{ route('familyHead.showOtherDeatails') }}">
            <input type="hidden" name="familyId" value="{{ $family_id  }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        @endif
        <Form action="{{ route('differentlyAbledPerson.store') }}" method="POST">
            @csrf
            <p class="h3">Add differentlyAbledPerson Form</p>
            <div class="form-group">
                <label>Type of Disability:</label>
                <select class="form-control" name="type">
                    <option>Intellectual disability</option>
                    <option>Learning disability</option>
                    <option>Hearing impairment</option>
                    <option>Hearing impairment</option>
                    <option>Physical disability</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date:</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                    id="">
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Reason:</label>
                <input type="text" name="reason" onkeypress="return isTextKey(event)"
                    class="form-control @error('reason') is-invalid @enderror" id="">
                @error('reason')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Monthly Assist:</label>
                <input type="text" name="monthly_assist" onkeypress="return isNumberKey(event)"
                    class="form-control @error('monthly_assist') is-invalid @enderror" id="">
                @error('monthly_assist')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Lump sum Amount:</label>
                <input type="text" name="amount" onkeypress="return isNumberKey(event)"
                    class="form-control @error('amount') is-invalid @enderror" id="">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input type="text" name="family_id" placeholder="family id want to be loaded" value="{{$family_id}}">
                <input type="text" name="member_id" placeholder="member id want to be loaded"
                    value="{{ $family_member_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

        </Form>
    </div>

@endsection
