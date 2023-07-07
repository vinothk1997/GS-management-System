@extends('layouts.master')
@section('title', 'edit social service')
@section('content')
    <div class="container">
        @if($socialService->member_id)
        <form action="{{ route('familyMember.show') }}">
            <input type="hidden" name="memberId" value="{{ $socialService->member_id }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        @elseif($socialService->family_id)
        <form action="{{ route('familyHead.showOtherDeatails') }}">
            <input type="hidden" name="familyId" value="{{$socialService->family_id }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        @endif
        <Form action="{{ route('socialService.update') }}" method="POST">
            @csrf
            @method('PUT')
            <p class="h3">Edit Social Service Form</p>
            <div class="form-group">
                <label>Type of Social Service:</label>
                <select class="form-control" name="type">
                    <option @if ($socialService->type == 'A') selected @endif)>A</option>
                    <option @if ($socialService->type == 'B') selected @endif>B</option>
                    <option @if ($socialService->type == 'C') selected @endif>C</option>
                </select>
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="text" name="amount" class="form-control" id=""
                    onkeypress="return isNumberKey(event)" value="{{ $socialService->amount }}">
            </div>
            @php
            $thisYear = date('Y');
        @endphp
        
        <div class="form-group">
            <label>Year:</label>
            <select name="year" class="form-control">
                @php
                    for ($year = $thisYear; $year >= $thisYear - 5; $year--) {
                        echo '<option ' . ($socialService->year == $year ? 'selected' : '') . ' value="' . $year . '">' . $year . '</option>';
                    }
                @endphp
            </select>
        </div>
            <div class="form-group">
                <label>Description:</label>
                <input type="text" name="description" onkeypress="return isTextKey(event)" class="form-control"
                    id="" value="{{ $socialService->description }}">
            </div>
            <div>
                <input type="hidden" name="social_service_id" value="{{ $socialService->social_service_id }}">
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
        </Form>
    </div>

@endsection
