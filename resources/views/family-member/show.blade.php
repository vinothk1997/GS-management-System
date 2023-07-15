@extends('layouts.master')
@section('title', 'show-member')
@section('content')
    <form action="{{ route('familyHead.show') }}">
        <input type="hidden" name="familyId" value="{{ $familyMember->family_id }}">
        <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
    </form>
    <div class="h3">
        Family Member:- {{ $familyMember->member_id }}
    </div>

    <table class="table">
        <tr>
            <td class="fw-bold">First Name</td>
            <td>{{ $familyMember->first_name }}</td>
            <td class="fw-bold"> Last Name</td>
            <td>{{ $familyMember->last_name }}</td>
        </tr>
        <tr>
            <td class="fw-bold">National Identity Card No</td>
            <td>{{ $familyMember->nic }}</td>
            <td class="fw-bold">Date of Birth</td>
            <td>{{ $familyMember->dob }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Gender</td>
            <td>{{ $familyMember->gender }}</td>
            <td class="fw-bold">Mobile</td>
            <td>{{ $familyMember->mobile }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Birth Certificate No</td>
            <td>{{ $familyMember->birth_certificate_no }}</td>
            <td class="fw-bold">Relationship</td>
            <td>{{ $familyMember->relationship }}</td>
        </tr>
        <tr>
            <td class="fw-bold">School</td>
            <td>{{ $familyMember->school }}</td>
            <td class="fw-bold"> Learning Place</td>
            <td>{{ $familyMember->learning_place_type }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Monthly Income</td>
            <td>{{ $familyMember->monthly_income }}</td>
            <td class="fw-bold">Driving Licence</td>
            <td>{{ $familyMember->driving_licence_no }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Occupation</td>
            <td>{{ $familyMember->occupation }}</td>
            <td class="fw-bold">Education</td>
            <td>{{ $familyMember->education }}</td>
        </tr>
    </table>
    <h3>Other Details</h3>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="socialService-head">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#socialService"
                    aria-expanded="true" aria-controls="socialService">
                    Social Service
                </button>
            </h2>
            <div id="socialService" class="accordion-collapse collapse show" aria-labelledby="socialService"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                        <form class=d-inline action="{{ route('socialService.create') }}">
                            <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                            <button type="submit" class="btn btn-primary my-2">Add
                                Social Service</button>
                        </form>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Type</th>
                            <th>Year</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($socialServices as $socialService)
                            <tr>
                                <td>{{ $socialService->type }}</td>
                                <td>{{ $socialService->year }}</td>
                                <td>{{ $socialService->amount }}</td>
                                <td>{{ $socialService->description }}</td>
                                @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                    <td>
                                        {{-- <a href="" class="btn btn-sm btn-success">View</a> --}}
                                        <form class=d-inline action="{{ route('socialService.edit') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="social_service_id"
                                                value="{{ $socialService->social_service_id }}">
                                            <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                        </form>
                                        <form class=d-inline action="{{ route('socialService.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="social_service_id"
                                                value="{{ $socialService->social_service_id }}">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @if (!empty($familyMember->vote))
            <div class="accordion-item">
                <h2 class="accordion-header" id="votingDetail-head">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#votingDetail" aria-expanded="false" aria-controls="votingDetail">
                        Voting Detail
                    </button>
                </h2>
                <div id="votingDetail" class="accordion-collapse collapse" aria-labelledby="votingDetail"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                            <form class=d-inline action="{{ route('votingDetail.create') }}">
                                <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-primary my-2">Add
                                    New Vote</button>
                            </form>
                        @endif
                        <table class="table">
                            <tr>
                                <th>Year</th>
                                <th>Vote No</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($votingDetails as $votingDetail)
                                <tr>
                                    <td>{{ $votingDetail->year }}</td>
                                    <td>{{ $votingDetail->vote_no }}</td>
                                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                        <td>
                                            {{-- <a href="" class="btn btn-sm btn-success">View</a> --}}
                                            <form class=d-inline action="{{ route('votingDetail.edit') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="voting_id"
                                                    value="{{ $votingDetail->Voting_id }}">
                                                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                            </form>
                                            <form class=d-inline action="{{ route('votingDetail.destroy') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="voting_id"
                                                    value="{{ $votingDetail->Voting_id }}">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @if (!empty($familyMember->occupation_id))
            <div class="accordion-item">
                <h2 class="accordion-header" id="pension-head">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#pension" aria-expanded="false" aria-controls="pension">
                        Pension
                    </button>
                </h2>
                <div id="pension" class="accordion-collapse collapse" aria-labelledby="pension"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                            <form class=d-inline action="{{ route('pension.create') }}">
                                <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                                <button type="submit" class="btn btn-primary my-2">Add
                                    New Pension</button>
                            </form>
                        @endif
                        <table class="table">
                            <tr>
                                <th>Pension No</th>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($pensions as $pension)
                                <tr>

                                    <td>{{ $pension->pension_no }}</td>
                                    <td>{{ $pension->bank }}</td>
                                    <td>{{ $pension->amount }}</td>
                                    <td>{{ $pension->category }}</td>
                                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                        <td>
                                            <form class=d-inline action="{{ route('pension.edit') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="pension_id"
                                                    value="{{ $pension->pension_id }}">
                                                <input type="hidden" name="member_id"
                                                    value="{{ $pension->member_id }}">
                                                <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                            </form>
                                            <form class=d-inline action="{{ route('pension.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="pension_id"
                                                    value="{{ $pension->pension_id }}">
                                                <input type="hidden" name="member_id"
                                                    value="{{ $pension->member_id }}">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endif
        <div class="accordion-item">
            <h2 class="accordion-header" id="death-head">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#death" aria-expanded="false" aria-controls="death">
                    Death
                </button>
            </h2>
            <div id="death" class="accordion-collapse collapse" aria-labelledby="death"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                        <form class=d-inline action="{{ route('death.create') }}">
                            <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                            <button type="submit" class="btn btn-primary my-2">Add
                                Death</button>
                        </form>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Death Date</th>
                            <th>Place</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($deaths as $death)
                            <td>{{ $death->death_date }}</td>
                            <td>{{ $death->place }}</td>
                            <td>{{ $death->reason }}</td>
                            @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                <td>
                                    <form class=d-inline action="{{ route('death.edit') }}" method="GET">
                                        @csrf
                                        @method('GET')
                                        <input type="hidden" name="death_id" value="{{ $death->death_id }}">
                                        <input type="hidden" name="member_id" value="{{ $death->member_id }}">
                                        <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                    </form>
                                    <form class=d-inline action="{{ route('death.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="death_id" value="{{ $death->death_id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                    </form>
                                </td>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="land-head">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#land" aria-expanded="false" aria-controls="land">
                    Land
                </button>
            </h2>
            <div id="land" class="accordion-collapse collapse" aria-labelledby="land"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                        <form class=d-inline action="{{ route('land.create') }}">
                            <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                            <button type="submit" class="btn btn-primary my-2">Add
                                Land</button>
                        </form>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Land Type</th>
                            <th>Land GN Divsion</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Registration No</th>
                            <th>Document</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($lands as $land)
                            <tr>

                                <td>{{ $land->land_type }}</td>
                                <td>{{ $land->GN->name }}</td>
                                <td>{{ $land->address }}</td>
                                <td>{{ $land->area }}</td>
                                <td>{{ $land->reg_no }}</td>
                                <td>
                                    <form class=d-inline action="{{ route('land.download') }}">
                                        <input type="hidden" name="path" value="{{ $land->document_file }}">
                                        <button type="submit" class="btn btn-link mx-1">Download</a>
                                    </form>
                                </td>
                                <td>
                                    <form class=d-inline action="{{ route('land.show') }}">
                                        <input type="hidden" name="land_id" value="{{ $land->land_id }}">
                                        <input type="hidden" name="member_id" value="{{ $land->member_id }}">
                                        <button type="submit" class="btn btn-sm btn-success mx-1">View</a>
                                    </form>
                                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                        <form class=d-inline action="{{ route('land.edit') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="id" value="{{ $land->land_id }}">
                                            <input type="hidden" name="member_id" value="{{ $land->member_id }}">
                                            <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                        </form>
                                        <form class=d-inline action="{{ route('land.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $land->land_id }}">
                                            <input type="hidden" name="member_id" value="{{ $land->member_id }}">

                                            <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="defferentlyAbledPersons">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#defferentlyAbledPerson" aria-expanded="false"
                    aria-controls="defferentlyAbledPerson">
                    Differently Abled Person
                </button>
            </h2>
            <div id="defferentlyAbledPerson" class="accordion-collapse collapse" aria-labelledby="defferentlyAbledPerson"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                        <form class=d-inline action="{{ route('differentlyAbledPerson.create') }}">
                            <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                            <button type="submit" class="btn btn-primary my-2">Add
                                differentlyAbledPerson</button>
                        </form>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Reason</th>
                            <th>Monthly Assist</th>
                            <th>Lump Sum Amount</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($defferentlyAbledPersons as $defferentlyAbledPerson)
                            <tr>

                                <td>{{ $defferentlyAbledPerson->type }}</td>
                                <td>{{ $defferentlyAbledPerson->date }}</td>
                                <td>{{ $defferentlyAbledPerson->reason }}</td>
                                <td>{{ $defferentlyAbledPerson->monthly_assist }}</td>
                                <td>{{ $defferentlyAbledPerson->amount }}</td>
                                <td>
                                    {{-- <a href="" class="btn btn-sm btn-success">View</a> --}}
                                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                        <form class=d-inline action="{{ route('differentlyAbledPerson.edit') }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="id"
                                                value="{{ $defferentlyAbledPerson->id }}">
                                            <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                        </form>
                                        <form class=d-inline action="{{ route('differentlyAbledPerson.destroy') }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id"
                                                value="{{ $defferentlyAbledPerson->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                        </form>
                                </td>
                        @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="vehicles">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#vehicle" aria-expanded="false" aria-controls="vehicle">
                    Vehicle Details
                </button>
            </h2>
            <div id="vehicle" class="accordion-collapse collapse" aria-labelledby="vehicle"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                        <form class=d-inline action="{{ route('vehicle.create') }}">
                            <input type="hidden" name="member_id" value="{{ $familyMember->member_id }}">
                            <button type="submit" class="btn btn-primary my-2">Add
                                Vehicle</button>
                        </form>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Vehicle Brand</th>
                            <th>Model</th>
                            <th>Date of Registration</th>
                            <th>Registration No</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($vehicles as $vehicle)
                            <tr>

                                <td>{{ $vehicle->VehicleModel->VehicleBrand->brand }}</td>
                                <td>{{ $vehicle->VehicleModel->name }}</td>
                                <td>{{ $vehicle->reg_date }}</td>
                                <td>{{ $vehicle->reg_no }}</td>
                                <td>
                                    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
                                        <form class=d-inline action="{{ route('vehicle.edit') }}" method="GET">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="model_id" value="{{ $vehicle->model_id }}">
                                            <input type="hidden" name="member_id" value="{{ $vehicle->member_id }}">
                                            <button type="submit" class="btn btn-sm btn-secondary mx-1">Edit</a>
                                        </form>
                                        <form class=d-inline action="{{ route('vehicle.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="model_id" value="{{ $vehicle->model_id }}">
                                            <input type="hidden" name="member_id" value="{{ $vehicle->member_id }}">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                                        </form>
                                </td>
                        @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var $isDeath = $('#death').find('td');
        if ($isDeath.length > 0) {
            $('#death-btn').hide();
        }
    </script>
@endsection
