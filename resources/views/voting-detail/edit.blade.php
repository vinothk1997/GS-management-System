@extends('layouts.master')
@section('title', 'edit voting details')
@section('content')
    <div class="container">
        <Form action="{{ route('votingDetail.update') }}" method="POST">
            @csrf
            @method('PUT')
            <p class="h3">Edit Voting Detail Form</p>
            <div class="form-group">
                <label>Vote No:</label>
                <input type="text" name="vote_no" onkeypress="return isTextKey(event)" class="form-control" id=""
                    value="{{ $votingDetail->vote_no }}">
            </div>
            @php
                $thisYear = date('Y');
            @endphp

            <div class="form-group">
                <label>Year:</label>
                <select name="year" class="form-control @error('year') is-invalid @enderror">
                    <?php
                    for ($year = $thisYear; $year >= $thisYear - 5; $year--) {
                        echo '<option value="' . $year . '" ' . ($votingDetail->year == $year ? 'selected' : '') . '>' . $year . '</option>';
                    }
                    ?>
                </select>
                @error('year')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label>Year:</label>
                <input type="number" name="year" min="1900" onkeypress="return isNumberKey(event)"
                    class="form-control" id="" value="{{ $votingDetail->year }}">
            </div> --}}
            <input type="hidden" name="voting_id" value="{{ $votingDetail->Voting_id }}">
            <div>
            </div>
            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

        </Form>
    </div>

@endsection
