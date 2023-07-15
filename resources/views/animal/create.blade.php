@extends('layouts.master')
@section('title', 'add animal')
@section('content')
    <div class="container">
        <div class="my-2">
            <form class="d-inline" action="{{route('familyHead.show')}}" method="GET">
                <input type="hidden" value="{{$family_id}}" name="familyId"/>
                <input type="submit" class="btn btn-sm btn-primary" value="Back">
            </form>
        </div>
        <Form action="{{ route('animal.store') }}" method="POST" id="animalForm">
            @csrf
            @php
                $animals = ['Cat', 'Dog', 'Rabbit', 'Sheep', 'Pig', 'Hen', 'Parrot', 'Cow'];
                // dd($animal_types)
            @endphp

            <p class="h3">Add Animal Form</p>
            @foreach ($animals as $animal)
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="checkbox" class="status" value="checked"
                                @if ($animal_types && in_array($animal, $animal_types)) checked @endif>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control type_of_animal" value="{{ $animal }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control no_of_animal"
                                value="@if ($animal_amounts && !empty($animal_amounts[$animal])) {{ $animal_amounts[$animal] }} @endif"
                                onkeypress="return isNumberKey(event)">
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <div>
        <input type="hidden" name="animals" id='animal_list' value='' />
        <input type="hidden" name="familyId" placeholder="family id want to be loaded" value="{{ $family_id }}">
    </div>
    @if (Session::get('user') && Session::get('user')['user_type'] != 'family head')
    <button class="btn btn-sm btn-primary float-right me-5 my-2" style="width:50px;" type="submit">Save</button>
    @endif
    </Form>
    </div>
    <script>
        let animals = []
        let animal = {
            status: '',
            type_of_animal: '',
            no_of_animal: ''
        }
        $(document).ready(function() {
            $('#animalForm').submit(function(event) {
                event.preventDefault(); // Prevent form submission
                $('.row').each(function() {
                    if ($(this).find('.status').is(':checked')) {
                        var $status = 'checked';
                    } else {
                        var $status = 'unchecked';
                    }
                    var $type_of_animal = $(this).find('.type_of_animal').val();
                    var $no_of_animal = $(this).find('.no_of_animal').val();
                    // console.log($status,$type_of_animal,$no_of_animal,'new')
                    animals.push({
                        status: $status,
                        type_of_animal: $type_of_animal,
                        no_of_animal: $no_of_animal
                    });
                    var jsonAnimals = JSON.stringify(animals);
                    $('#animal_list').val(jsonAnimals);
                });
                event.currentTarget.submit(); // Submit the form
            })
        });
    </script>
@endsection
