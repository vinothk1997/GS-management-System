@extends('layouts.master')
@section('title','add animal')
@section('content')
<div class="container">
    <Form action="{{route('animal.store')}}" method="POST" id="animalForm">
        @csrf
        @php
        $animals=['Cat','Dog'];
        @endphp

        <p class="h3">Add Animal Form</p>
        @foreach($animals as $animal)
        <div class="row mw-50">
            <div class="col">
                <input type="checkbox" class="status"  value="checked">
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control type_of_animal" value="{{$animal}}" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="text"  class="form-control no_of_animal"
                    onkeypress="return isNumberKey(event)">
                </div>
            </div>
            @endforeach
        </div>
        <div>
            <input type="hidden" name="animals" id='animal_list' value=''/>
            <input type="text" name="familyId" placeholder="family id want to be loaded" value="{{$family_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>
<script>
    let animals=[]
    let animal={
        status:'',
        type_of_animal:'',
        no_of_animal:''
    }
    $(document).ready(function() {
  $('#animalForm').submit(function(event) {
    event.preventDefault(); // Prevent form submission
    $('.row').each(function()
    {
        if ($(this).find('.status').is(':checked')){
            var $status='checked';
        }
        else{
            var $status='unchecked';
        }
        var $type_of_animal=$(this).find('.type_of_animal').val();
        var $no_of_animal=$(this).find('.no_of_animal').val();
        // console.log($status,$type_of_animal,$no_of_animal,'new')
        animals.push(
        {
            status:$status,
            type_of_animal:$type_of_animal,
            no_of_animal:$no_of_animal
        });
        var jsonAnimals=JSON.stringify(animals);
        $('#animal_list').val(jsonAnimals);
    });
    event.currentTarget.submit(); // Submit the form
  })});
    
</script>
@endsection