@extends('layouts.master')
@section('title', 'add-familyHead')
@section('content')
    <div class="container mt-3">
        <p class="h3">Add Family Member Form</p>
        <form class="d-inline" action="{{ route('familyHead.show') }}" method="GET">
            <input type="hidden" value="{{ $familyId }}" name="familyId" />
            <input type="submit" class="btn btn-sm btn-primary" value="Back">
        </form>
        <Form action="{{ route('familyMember.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" name="fname" id="" onkeypress="return isTextKey(event)"
                            class="form-control  @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                        @error('fname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" name="lname" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
                        @error('lname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>National Identity Card:</label>
                        <input type="text" name="nic" id="nic" onblur="nicnumber()"
                            class="form-control @error('nic') is-invalid @enderror" value="{{ old('nic') }}">
                        @error('nic')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input type="date" name="dob" id="dob"
                            class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                        @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label>Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id='gender' checked
                                value="male">
                            <label class="form-check-label ">Male</label>
                            <br>
                            <input class="form-check-input" type="radio" name="gender" id='gender' value="female">
                            <label class="form-check-label ">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Mobile No:</label>
                        <input type="text" name="mobile" id=""
                            class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}">
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Birth Certificate Number:</label>
                        <input type="text" name="birth_c_no" id=""
                            class="form-control @error('birth_c_no') is-invalid @enderror" value="{{ old('birth_c_no') }}">
                        @error('birth_c_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Relationship:</label>
                        <input type="text" name="relationship" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('relationship') is-invalid @enderror"
                            value="{{ old('relationship') }}">
                        @error('relationship')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>School :</label>
                        <input type="text" name="school" id="" onkeypress="return isTextKey(event)"
                            class="form-control @error('school') is-invalid @enderror" value="{{ old('school') }}">
                        @error('school')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Learning Place Type:</label>
                        <input type="text" name="learning_place_type" id=""
                            onkeypress="return isTextKey(event)"
                            class="form-control @error('learning_place_type') is-invalid @enderror"
                            value="{{ old('learning_place_type') }}">
                        @error('learning_place_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Monthly Income:</label>
                        <input type="text" name="monthly_income" id=""
                            onkeypress="return isNumberKey(event)"
                            class="form-control @error('monthly_income') is-invalid @enderror"
                            value="{{ old('monthly_income') }}">
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
                            value="{{ old('driving_licence_no') }}">
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
                                <option value="{{ $occupation }}">{{ $occupation }}</option>
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
                                <option value="{{ $education }}">{{ $education }}</option>
                            @endforeach
                        </select>
                        @error('education')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
            <br>
            <input type="hidden" name="familyId" value="{{ $familyId }}">
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>

@endsection
