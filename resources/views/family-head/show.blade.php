@extends('layouts.master')
@section('title', 'familyHeads')
@section('content')
    <!-- Button trigger modal -->
    <div class="position-absolute" style="top:40%; right:0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
    <p class="h3">Family Members Table</p>
    <div class="my-3">
        <a href="/family-Heads" class="btn btn-sm btn-primary">&#60;&#60;Back</a>
        <form class="d-inline" action="{{ route('familyMember.create') }}" method="GET">
            @csrf
            @method('GET')
            <input type="hidden" value="{{ $familyId }}" name="familyId">
            <button type="submit" class="btn btn-sm btn-success">Add New</a>
        </form>
        <form class="d-inline" action="{{ route('report.generateFamilyReport') }}" method="GET" target="_blank">
            @csrf
            @method('GET')
            <input type="hidden" value="{{ $familyId }}" name="familyId">
            <button type="submit" class="btn btn-sm btn-primary ms-2">Generate Report</button>
        </form>
    </div>
    <div class="rounded" style="background-color:white;">
        <table class="table">
            <tr>
                <td class="fw-bold">Full Name:</td>
                <td>{{ $familyHead->first_name }} {{ $familyHead->last_name }}</td>
                <td class="fw-bold">Date of Birth:- </td>
                <td>{{ $familyHead->nic }}</td>
            </tr>
            <tr>
                <td class="fw-bold"> Mobile:-</td>
                <td> {{ $familyHead->mobile }}</td>
                <td class="fw-bold">Permanent Address:-</td>
                <td>{{ $familyHead->permanent_address }}</td>
            </tr>
            <tr>
                <td class="fw-bold">House No:- </td>
                <td>{{ $familyHead->house_no }}</td>
                <td class="fw-bold">Interest:- </td>
                <td>{{ $familyHead->internet }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Card Type:- </td>
                <td>{{ $familyHead->card_type }}</td>
                <td class="fw-bold">Married Certificate No:- </td>
                <td>{{ $familyHead->married_certificate_no }}</td>
            </tr>
            <tr>
                <td class="fw-bold">Religion:- </td>
                <td>{{ $religion }}</td>
                <td class="fw-bold"> Occupation:- </td>
                <td>{{ $occupation }}</td>
            </tr>
            <tr>
                <td class="fw-bold"> Ethnic:-</td>
                <td> {{ $ethnic }}</td>
            </tr>
        </table>
    </div>
    <div>
        @if ($familyHead->status == 'active')
            <form class="d-inline" action="{{ route('familyHead.edit') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="familyId" value="{{ $familyHead->family_id }}" />
                <button type="submit" class="btn btn-sm btn-success px-5  mb-3 mx-2">Edit</a>
            </form>
        @endif
    </div>
    <div style="background-color: white !important" class="mt-1">
        <h3>Active Members</h3>
    </div>
    <table id="member" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Member Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NIC</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($familyMembers as $familyMember)
                @if (empty($familyMember->Death))
                    <tr>
                        <td>{{ $familyMember->member_id }}</td>
                        <td>{{ $familyMember->first_name }}</td>
                        <td>{{ $familyMember->last_name }}</td>
                        <td>{{ $familyMember->nic }}</td>
                        <td>{{ $familyMember->dob }}</td>
                        <td>{{ $familyMember->gender }}</td>
                        <td>
                            <form class=d-inline action="{{ route('familyMember.show') }}" method="GET">
                                <input type="hidden" name="memberId" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-sm btn-primary mx-1">View</a>
                            </form>
                            <form class=d-inline action="{{ route('familyMember.edit') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="memberId" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                            </form>
                            <form class=d-inline action="{{ route('familyMember.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="memberId" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div style="background-color: white !important" class="mt-4">
        <h3 >Dead Members</h3>
    </div>
    <table id="dead-member" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Member Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NIC</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($familyMembers as $familyMember)
                @if (!empty($familyMember->Death))
                    <tr>
                        <td>{{ $familyMember->member_id }}</td>
                        <td>{{ $familyMember->first_name }}</td>
                        <td>{{ $familyMember->last_name }}</td>
                        <td>{{ $familyMember->nic }}</td>
                        <td>{{ $familyMember->dob }}</td>
                        <td>{{ $familyMember->gender }}</td>
                        <td>
                            <form class=d-inline action="{{ route('familyMember.show') }}" method="GET">
                                <input type="hidden" name="memberId" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-sm btn-primary mx-1">View</a>
                            </form>
                            <form class=d-inline action="{{ route('familyMember.edit') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="memberId" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                            </form>
                            <form class=d-inline action="{{ route('familyMember.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="memberId" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#member').DataTable();
        });
        $(document).ready(function() {
            $('#dead-member').DataTable();
        });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="d-inline" action="{{ route('infrastructure.create') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $familyHead->family_id }}" name="family_id" />
                        <input type="submit" class="btn btn-sm btn-primary m-2" value="Infrastructure">
                    </form>
                    <form class="d-inline" action="{{ route('donation.familyHeadDonationIndex') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $familyHead->family_id }}" name="family_id" />
                        <input type="submit" class="btn btn-sm btn-primary" value="Donation">
                    </form>
                    <form class="d-inline" action="{{ route('animal.create') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $familyHead->family_id }}" name="family_id" />
                        <input type="submit" class="btn btn-sm btn-primary" value="Animals">
                    </form>
                    <form class="d-inline" action="{{ route('livelihood.indexByFamilyHead') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $familyHead->family_id }}" name="family_id" />
                        <input type="submit" class="btn btn-sm btn-primary" value="LiveliHood">
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
