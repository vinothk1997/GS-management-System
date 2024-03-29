@extends('layouts.master')
@section('title','add pension')
@section('content')
<div class="container">
  <div>
    @if($pension->member_id)
    <form action="{{ route('familyMember.show') }}">
        <input type="hidden" name="memberId" value="{{ $pension->member_id  }}">
        <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
    </form>
    @elseif($pension->family_id)
    <form action="{{ route('familyHead.showOtherDeatails') }}" >
        <input type="hidden" name="familyId" value="{{ $pension->family_id }}">
        <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
    </form>
    @endif
  </div>
    <Form action="{{route('pension.store')}}" method="POST">
        @csrf
        @method('PUT')
        <p class="h3">Edit Pension Form</p>
        <div class="form-group">
            <label>Pension No:</label>
            <input type="text" name="pension_no" class="form-control" id="" value="{{$pension->pension_no}}">
        </div>
        <div class="form-group">
            <label>Bank :</label>
            <select name="bank" class="form-control" id="">
                @foreach($banks as $bank )
                <option @if($pension->bank==$bank) selected @endif>{{$bank}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" onkeypress="return isNumberKey(event)" class="form-control" id=""
                value="{{$pension->amount}}">
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select name="category" class="form-control">
                <option @if($pension->category=='EPF') selected @endif >EPF</option>
                <option @if($pension->category=='Government') selected @endif >Government</option>
            </select>
        </div>
        <input type="hidden" name="pension_id" value="{{$pension->pension_id}}"/>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection