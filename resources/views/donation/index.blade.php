@extends('layouts.master')
@section('title','add-assistType')
@section('content')
<p class="h3">Donation Table</p>
<a href="{{route('donation.create')}}" class="btn btn-primary">Add New</a>
<table class="table">
    <tr>
        <th>Donation Id</th>
        <th>Date</th>
        <th>Organization</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Description</th>
    </tr>
    @foreach($donations as $donation)
    <tr>
        <td>{{$donation->donation_id}}</th>
        <td>{{$donation->date}}</th>
        <td>{{$donation->organization}}</th>
        <td>{{$donation->type}}</th>
        <td>{{$donation->amount}}</th>
        <td>{{$donation->description}}</th>
        <td>
            <a href="" class="btn btn-sm btn-success">View</a>
            <form class=d-inline action="{{route('donation.edit')}}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="donation_id" value="{{$donation->donation_id}}">
                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
            </form>
            <form class=d-inline action="{{route('donation.destroy')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="donation_id" value="{{$donation->donation_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection