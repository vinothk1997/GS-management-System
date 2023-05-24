@extends('layouts.master')
@section('title','edit-FamilyHead')
@section('content')
<div class="container mt-3">
    <a href="{{route('profile.showUserDetails')}}" class='btn btn-primary btn-sm my-3 px-4'>Go Back</a>
    <p class="h3"> Edit Profile Form</p>
    <Form action="{{route('profile.updateProfileDetail')}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" id="" onkeypress="return isTextKey(event)" class="form-control"
                value="{{$familyHead->first_name}}">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" id="" onkeypress="return isTextKey(event)" class="form-control"
                value="{{$familyHead->last_name}}">
        </div>
        <div class="form-group">
            <label>Mobile No:</label>
            <input type="text" name="mobile" id="mobile" onkeypress="return isNumberKey(event)"
                onblur="return phonenumber('mobile')" class="form-control" value="0{{$familyHead->mobile}}">
        </div>
        <div class="form-group">
            <label>Permenant Address:</label>
            <input type="text" name="p_address" id="" onkeypress="return isTextKey(event)" class="form-control"
                value="{{$familyHead->permanent_address}}">
        </div>
        <div class="form-group">
            <label>Temporary Address:</label>
            <input type="text" name="t_address" id="" onkeypress="return isTextKey(event)" class="form-control"
                value="{{$familyHead->temporary_address}}">
        </div>

        <div class="form-group">
            <label>Internet:</label>
            <input type="text" name="internet" id="" class="form-control" value="{{$familyHead->internet}}">
        </div>
        <label>Religion: </label>
        <select name="religion" class="form-control" value="{{$familyHead->fname}}">
            @foreach($religions as $religion)
            <option @if($religion) selected @endif>{{$religion}}</option>
            @endforeach
        </select>
        <label>Occupation</label>
        <select name="occupation" class="form-control" value="{{$familyHead->fname}}">
            @foreach($occupations as $occupation)
            <option @if($religion) selected @endif>{{$occupation}}</option>
            @endforeach
        </select>
        <input type="hidden" name="familyId" value="{{$familyHead->family_id}}" />
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>
    </Form>
</div>
@endsection