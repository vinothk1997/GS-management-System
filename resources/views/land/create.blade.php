@extends('layouts.master')
@section('title','add land')
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
    <Form action="{{route('land.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="h3">Add Land Form</p>
        <div class="form-group">
            <label>Land Type:</label>
            <select class="form-control" name="land_type">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        {{-- <div class="form-group">
            <label>Land GN Id:</label>
            <input type="text" name="land_gn_id" class="form-control" id="">
        </div> --}}
        <div class="form-group">
            <label>Land GN:</label>
            <select name="land_gn_id" class="form-control">
                @foreach($gns as $gn)
                <option value="{{$gn->gn_id}}">{{$gn->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" onkeypress="return isTextKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Area (in perch):</label>
            <input type="text" name="area" onkeypress="return isNumberKey(event)" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Reg.No:</label>
            <input type="text" name="reg_no" class="form-control" id="">
        </div>
        <div class="form-group">
            <label>Upload Documents:</label>
            <input type="file" name="document" class="form-control" id="" multiple>
        </div>
        <input type="hidden" name="family_id" placeholder="family id want to be loaded" value="{{$family_id}}">
        <input type="hidden" name="member_id" placeholder="member id want to be loaded"
            value="{{ $family_member_id }}">
        <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>

    </Form>
</div>

@endsection