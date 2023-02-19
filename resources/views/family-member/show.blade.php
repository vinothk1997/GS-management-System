@extends('layouts.master')
@section('title','show-member')
@section('content')
<div>
    Detail information :- {{$familyMember->member_id}}
</div>
{{$familyMember->first_name}} {{$familyMember->fname}}
{{$familyMember->last_name}}
{{$familyMember->nic}}
{{$familyMember->dob}}
{{$familyMember->gender}}
{{$familyMember->mobile}}
{{$familyMember->birth_certificate_no}}
{{$familyMember->relationship}}
{{$familyMember->school}}
{{$familyMember->learning_place_type}}
{{$familyMember->monthly_income}}
{{$familyMember->driving_licence_no}}
{{$familyMember->occupation}}
{{$familyMember->education}}
@endsection