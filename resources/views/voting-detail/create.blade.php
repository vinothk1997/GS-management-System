@extends('layouts.master')
@section('title', 'add voting details')
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
        <div>
            <Form action="{{route('votingDetail.store')}}" method="POST">
                @csrf
                <p class="h3">Add Voting Detail Form</p>
                <div class="form-group">
                    <label>Vote No:</label>
                    <input type="text" name="vote_no" class="form-control @error('vote_no') is-invalid @enderror"
                        id="">
                    @error('vote_no')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @php
                    $thisYear = date('Y');
                @endphp
    
                <div class="form-group">
                    <label>Year:</label>
                    <select name="year" class="form-control @error('year') is-invalid @enderror">
                        @php
                            for ($year = $thisYear; $year >= $thisYear - 5; $year--) {
                                echo '<option value="' . $year . '">' . $year . '</option>';
                            }
                        @endphp
                    </select>
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="hidden" name="family_id" placeholder="family id want to be loaded" value="{{$family_id}}">
                    <input type="hidden" name="member_id" placeholder="Member id want to be loaded"
                        value="{{ $family_member_id }}">
                </div>
                <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
    
            </Form>
            
        </div>
    </div>

@endsection
