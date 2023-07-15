@extends('layouts.master')
@section('title','add deaths')
@section('content')
<div class="container">
    <div>
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
    </div>
    <Form action="{{route('death.store')}}" method="POST">
        @csrf
        <p class="h3">Add Death Form</p>
        <div class="form-group">
            <label>Date of death:</label>
            <input type="date" name="death_date" class="form-control" id="" max="@php echo date('Y-m-d') @endphp">

        </div>
        <div class="form-group">
            <label>Place of death:</label>
            <input type="text" name="place" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Reason:</label>
            <textarea name="reason" id="" class="form-control" cols="30"
                rows="5"></textarea>
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