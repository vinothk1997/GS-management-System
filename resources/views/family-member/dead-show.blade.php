@extends('layouts.master')
@section('title', 'show-member')
@section('content')
    <div>

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
        <div style="background-color:white;">
            <h3>Other Details</h3>
            <hr class="m-0" />
            <div>
                <h5>Social Service Details</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th>Description</th>
                    </tr>
                    @foreach ($socialServices as $socialService)
                        <tr>
                            <td>{{ $socialService->type }}</td>
                            <td>{{ $socialService->year }}</td>
                            <td>{{ $socialService->amount }}</td>
                            <td>{{ $socialService->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                @if (!empty($familyMember->vote))
                    <h5>Voting Details</h5>
                    <table class="table">
                        <tr>
                            <th>Year</th>
                            <th>Vote No</th>

                        </tr>

                        @foreach ($votingDetails as $votingDetail)
                            <tr>
                                <td>{{ $votingDetail->year }}</td>
                                <td>{{ $votingDetail->vote_no }}</td>

                            </tr>
                        @endforeach
                    </table>

                @endif
            </div>
            <div>
                <h5>Pension Details</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Pension No</th>
                        <th>Bank</th>
                        <th>Amount</th>
                        <th>Category</th>
                    </tr>
                    @foreach ($pensions as $pension)
                        <tr>

                            <td>{{ $pension->pension_no }}</td>
                            <td>{{ $pension->bank }}</td>
                            <td>{{ $pension->amount }}</td>
                            <td>{{ $pension->category }}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                <h5> Death Details</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Death Date</th>
                        <th>Place</th>
                        <th>Reason</th>

                    </tr>
                    @foreach ($deaths as $death)
                        <td>{{ $death->death_date }}</td>
                        <td>{{ $death->place }}</td>
                        <td>{{ $death->reason }}</td>
                    @endforeach
                </table>
            </div>
            <div>
                <h5>Land Details</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Land Type</th>
                        <th>Land GN Divsion</th>
                        <th>Address</th>
                        <th>Area</th>
                        <th>Registration No</th>
                        <th>Document</th>
                    </tr>
                    @foreach ($lands as $land)
                        <tr>

                            <td>{{ $land->land_type }}</td>
                            <td>{{ $land->GN->name }}</td>
                            <td>{{ $land->address }}</td>
                            <td>{{ $land->area }}</td>
                            <td>{{ $land->reg_no }}</td>
                            <td><img src="{{ asset('storage/' . $land->document_file) }}" class="round"
                                    alt="Document Preview" width="100"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                <h5>Differently Abled Person Details</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Monthly Assist</th>
                        <th>Amount</th>
                    </tr>
                    @foreach ($defferentlyAbledPersons as $defferentlyAbledPerson)
                        <tr>
                            <td>{{ $defferentlyAbledPerson->type }}</td>
                            <td>{{ $defferentlyAbledPerson->date }}</td>
                            <td>{{ $defferentlyAbledPerson->reason }}</td>
                            <td>{{ $defferentlyAbledPerson->monthly_assist }}</td>
                            <td>{{ $defferentlyAbledPerson->amount }}</td>
                        </tr>
                    @endforeach
                </table>
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
