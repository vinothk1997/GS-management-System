@extends('layouts.master')
@section('title', 'add pension')
@section('content')
    <div class="container">
        @if($family_member_id)
        <form action="{{ route('familyMember.show') }}">
            <input type="hidden" name="memberId" value="{{ $family_member_id  }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        @elseif($family_id)
        <form action="{{ route('familyHead.showOtherDeatails') }}" >
            <input type="hidden" name="familyId" value="{{ $family_id  }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        @endif
        <Form action="{{ route('pension.store') }}" method="POST">
            @csrf
            <p class="h3">Add Pension Form</p>
            <div class="form-group">
                <label>Pension No:</label>
                <input type="text" name="pension_no" class="form-control @error('pension_no') is-invalid @enderror"
                    id="">
                @error('pension_no')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Bank :</label>
                <select name="bank" class="form-control" id="">
                    @foreach ($banks as $bank)
                        <option>{{ $bank }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="text" name="amount" onkeypress="return isNumberKey(event)"
                    class="form-control @error('amount') is-invalid @enderror" id="">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select name="category" class="form-control @error('category') is-invalid @enderror">
                    <option>EPF</option>
                    <option>Government</option>
                </select>
            </div>
            <input type="text" name="family_id" placeholder="family id want to be loaded" value="{{$family_id}}">
            <input type="text" name="member_id" placeholder="member id want to be loaded"
                value="{{ $family_member_id }}">

            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

        </Form>
    </div>

@endsection
