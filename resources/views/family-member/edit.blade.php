@extends('layouts.master')
@section('title', 'edit-familyHead')
@section('content')
    <div class="container mt-3">
        <p class="h3">Edit Family Member Form</p>
        <div>
            <form class="d-inline me-1" action="{{ route('familyHead.show') }}" method="GET">
                @csrf
                @method('GET')
                <input type="hidden" name="familyId" value="{{ $familyMember->family_id }}" />
                <button type="submit" class="btn btn-link">Back</button>
            </form>
        </div>
        <Form action=" {{ route('familyMember.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" name="fname" id=""
                            class="form-control  @error('fname') is-invalid @enderror"
                            value="{{ $familyMember->first_name }}">
                        @error('fname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" name="lname" id=""
                            class="form-control @error('lname') is-invalid @enderror"
                            value="{{ $familyMember->last_name }}">
                        @error('lname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>National Identity Card:</label>
                        <input type="text" name="nic" id=""
                            class="form-control @error('nic') is-invalid @enderror" value="{{ $familyMember->nic }}">
                        @error('nic')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input type="date" name="dob" id=""
                            class="form-control @error('dob') is-invalid @enderror" value="{{ $familyMember->dob }}">
                        @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Gender:</label>
                        <br>
                        <input class="form-check-input" type="radio" name="gender"
                            @if ($familyMember->gender == 'male') checked @endif value="male">
                        <label class="form-check-label">Male</label>
                        <br>
                        <input class="form-check-input ms-2" type="radio" name="gender"
                            @if ($familyMember->gender == 'female') checked @endif value="female">
                        <label class="form-check-label">Female</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Mobile No:</label>
                        <input type="text" name="mobile" id=""
                            class="form-control @error('mobile') is-invalid @enderror" value="{{ $familyMember->mobile }}">
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Birth Certificate Number:</label>
                        <input type="text" name="birth_c_no" id=""
                            class="form-control @error('birth_c_no') is-invalid @enderror"
                            value="{{ $familyMember->birth_certificate_no }}">
                        @error('birth_c_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Relationship:</label>
                        <input type="text" name="relationship" id=""
                            class="form-control @error('relationship') is-invalid @enderror"
                            value="{{ $familyMember->relationship }}">
                        @error('relationship')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>School :</label>
                        <input type="text" name="school" id=""
                            class="form-control @error('school') is-invalid @enderror" value="{{ $familyMember->school }}">
                        @error('school')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Learning Place Type:</label>
                        <input type="text" name="learning_place_type" id=""
                            class="form-control @error('learning_place_type') is-invalid @enderror"
                            value="{{ $familyMember->learning_place_type }}">
                        @error('learning_place_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Monthly Income:</label>
                        <input type="text" name="monthly_income" id=""
                            class="form-control @error('monthly_income') is-invalid @enderror"
                            value="{{ $familyMember->monthly_income }}">
                        @error('monthly_income')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Driving Licence No:</label>
                        <input type="text" name="driving_licence_no" id=""
                            class="form-control  @error('driving_licence_no') is-invalid @enderror"
                            value="{{ $familyMember->driving_licence_no }}">
                        @error('driving_licence_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Occupation:</label>
                        <select name="occupation" class="form-control  @error('occupation') is-invalid @enderror"
                            value="{{ old('occupation') }}">
                            <option>-- Choose occupation --</option>
                            @foreach ($occupations as $occupation)
                                <option @if ($selectedOccupation) selected @endif value="{{ $occupation }}">
                                    {{ $occupation }}</option>
                            @endforeach
                        </select>
                        @error('occupation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Education:</label>
                        <select name="education" class="form-control  @error('education') is-invalid @enderror"
                            value="{{ old('ethnic') }}">
                            <option>-- Choose education --</option>
                            @foreach ($educations as $education)
                                <option @if ($selectedEducation) selected @endif value="{{ $education }}">
                                    {{ $education }}</option>
                            @endforeach
                        </select>
                        @error('education')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <input type="hidden" name="memberId" value="{{ $memberId }}">
            <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
        </Form>
    </div>
@endsection
