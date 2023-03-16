@extends('layouts.master')
@section('title','add-familyHead')
@section('content')
<div class="container mt-3">
    <p class="h3">Add Family Form</p>
    <a href="{{route('familyHead.index')}}">Back</a>
    <Form action="{{route('familyHead.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" id="" onkeypress="return isTextKey(event)"
                class="form-control  @error('fname') is-invalid @enderror" value="{{old('fname')}}">
            @error('fname')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" id="" onkeypress="return isTextKey(event)"
                class="form-control @error('lname') is-invalid @enderror" value="{{old('lname')}}">
            @error('lname')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>National Identity Card:</label>
            <input type="text" name="nic" id="nic" onblur="nicnumber()"
                class="form-control @error('nic') is-invalid @enderror" value="{{old('nic')}}">
            @error('nic')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror"
                value="{{old('dob')}}" readonly>
            @error('dob')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror"
                value="{{old('gender')}}" readonly>
            @error('gender')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" id="mobile" onblur=" return phonenumber(mobile)"
                class="form-control @error('mobile') is-invalid @enderror" value="{{old('mobile')}}">
            @error('mobile')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Permenant Address:</label>
            <input type="text" name="p_address" id="" onkeypress="return isTextKey(event)"
                class="form-control @error('p_address') is-invalid @enderror" value="{{old('p_address')}}">
            @error('p_address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Temporary Address:</label>
            <input type="text" name="t_address" id="" onkeypress="return isTextKey(event)"
                class="form-control @error('t_address') is-invalid @enderror" value="{{old('t_address')}}">
            @error('t_address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>House No:</label>
            <input type="text" name="house_no" id="" class="form-control @error('house_no') is-invalid @enderror"
                value="{{old('house_no')}}">
            @error('house_no')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Card Type:</label>
            <select name="card_type" id="" class="form-control @error('card_type') is-invalid @enderror"
                value="{{old('card_type')}}">
                <option>-- Select a card type --</option>
                <option value='U'>U</option>
                <option value='A'>A</option>
            </select>
            @error('card_type')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Internet:</label>
            <select name="internet" id="" class="form-control @error('internet') is-invalid @enderror"
                value="{{old('internet')}}">
                <option>-- Select type of internet service you have --</option>
                <option value="ADSL">ADSL</option>
                <option value="Fiber">Fiber</option>
                <option value="Internet Card">Internet Card</option>
            </select>
            @error('internet')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Married Certificate No:</label>
            <input type="text" name="married_c_no" id=""
                class="form-control  @error('married_c_no') is-invalid @enderror" value="{{old('married_c_no')}}">
            @error('married_c_no')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- GN ID want to be hidden -->
        <label>GN ID</label>
        <input type="text" name="gn_id" id="" class="form-control  @error('gn_id') is-invalid @enderror">
        <div class="form-group">
            <label>Religion:</label>

            <select name="religion" class="form-control  @error('religion') is-invalid @enderror"
                value="{{old('religion')}}">
                <option>-- Choose religion --</option>
                @foreach($religions as $religion)
                <option value="{{$religion}}">{{$religion}}</option>
                @endforeach
            </select>
            @error('religion')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Ethnic:</label>
            <select name="ethnic" class="form-control  @error('ethnic') is-invalid @enderror" value="{{old('ethnic')}}">
                <option>-- Choose ethnic --</option>
                @foreach($ethnics as $ethnic)
                <option value="{{$ethnic}}">{{$ethnic}}</option>
                @endforeach
            </select>
            @error('ethnic')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Occupation:</label>
            <select name="occupation" class="form-control  @error('occupation') is-invalid @enderror"
                value="{{old('occupation')}}">
                <option>-- Choose occupation --</option>
                @foreach($occupations as $occupation)
                <option value="{{$occupation}}"> {{$occupation}}</option>
                @endforeach
            </select>
            @error('occupation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>
    </Form>
</div>

@endsection