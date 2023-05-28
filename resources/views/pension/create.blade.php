@extends('layouts.master')
@section('title', 'add pension')
@section('content')
    <div class="container">
        <form action="{{ route('familyMember.show') }}">
            <input type="hidden" name="memberId" value="{{ $member_id }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
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
            <input type="hidden" name="family_id" placeholder="family Id" class="form-control" id="">
            <input type="hidden" name="member_id" placehoder="member Id" class="form-control" id=""
                value="{{ $member_id }}">

            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

        </Form>
    </div>

@endsection
