@extends('layouts.master')
@section('title','add-vote')
@section('content')
<p class="h3">Voting Detail Table</p>
<table class="table">
    <tr>
        <th>Vote No</th>
        <th>Year</th>
        <th>Action</th>
    </tr>
    @foreach($votingDetails as $votingDetail)
    <tr>
        <td>{{$votingDetail->vote_no}}</th>
        <td>{{$votingDetail->year}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('votingDetail.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="voting_id" value="{{$votingDetail->Voting_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('votingDetail.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="voting_id" value="{{$votingDetail->Voting_id}}">
                <button type="submit"  class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection