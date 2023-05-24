@extends('layouts.master')
@section('title','livelihoods')
@section('content')
<p class="h3">Livelihood Table</p>
<div class="">
    
    <form class="d-inline" action="{{route('familyHead.show')}}" method="GET">
        @csrf
        <input type="hidden" value="{{$family_id}}" name="family_id"/>
        <input type="submit" class="btn btn-sm btn-primary" value="Back">
    </form>
    <form class="d-inline" action="{{route('livelihood.create')}}" method="GET">
        <input type="hidden" value="{{$family_id}}" name="family_id"/>
        <input type="submit" class="btn btn-sm btn-primary" value="Add Livelihood">
    </form>
</div>
<table class="table">
    <tr>
        <th>Start Date</th>
        <th>Amount</th>
        <th>Assist Type</th>
        <th>End Date</th>
        <th>Action</th>
    </tr>
    @foreach($livelihoods as $livelihood)
    <tr>
        <td>{{$livelihood->start_date}}</th>
        <td>{{$livelihood->amount}}</th>
        <td>{{$livelihood->AssistType->name}}</th>
        <td>{{$livelihood->end_date}}</th>
        <td>
            @if(empty($livelihood->end_date))
            <form class=d-inline action="{{route('livelihood.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="livelihood_id" value="{{$livelihood->livelihood_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            @endif
            {{-- <form class=d-inline action="{{route('livelihood.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="livelihood_id" value="{{$livelihood->livelihood_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form> --}}
        </td>
    </tr>
    @endforeach
</table>
@endsection