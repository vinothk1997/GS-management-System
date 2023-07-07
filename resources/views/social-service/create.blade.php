@extends('layouts.master')
@section('title', 'add social service')
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
        <Form action="{{ route('socialService.store') }}" method="POST">
            @csrf
            <p class="h3">Add Social Service Form</p>
            <div class="form-group">
                <label>Type of Social Service:</label>
                <select class="form-control" name="type">
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                </select>
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control"
                    id="" class="@error('amount') is-invalid @enderror">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @php
                $thisYear = date('Y');
            @endphp

            <div class="form-group">
                <label>Year:</label>
                <select name="year" class="form-control">
                    @php
                        for ($year = $thisYear; $year >= $thisYear - 5; $year--) {
                            echo '<option value="' . $year . '">' . $year . '</option>';
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <input type="text" name="description" onkeypress="return isTextKey(event)" class="form-control"
                    id="">
            </div>
            <div>
                <input type="hidden" name="family_id" placeholder="family id want to be loaded" value="{{$family_id}}">
                <input type="hidden" name="member_id" placeholder="member id want to be loaded"
                    value="{{ $family_member_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

        </Form>
    </div>

@endsection
