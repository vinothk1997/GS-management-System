@extends('layouts.master')
@section('title', 'add-vehicleBrand')
@section('content')
    <div class="container mt-3">
        <p class="h3">Add Model Form</p>
        <form action="{{ route('familyMember.show') }}">
            <input type="hidden" name="memberId" value="{{ $memberId }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        <Form action="{{ route('vehicle.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Vehicle Brand:</label>
                <select class="form-control" name="vehicle_brand" id="vehicle_brand">
                    <option>select brand</option>
                    @foreach ($vehicleBrands as $vehicleBrand)
                        <option value={{ $vehicleBrand->brand_id }}>{{ $vehicleBrand->brand }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label>Vehicle model:</label>
                <select name="vehicle_model" class="form-control" name="vehicle_model" id="veicle_model">
                    
                </select>
            </div>
            <div class="form-group">
                <label>Registration No:</label>
                <input type="text" class="form-control" name="reg_no">
            </div>
            <div class="form-group">
                <label>Registration Date:</label>
                <input type="date" class="form-control" name="reg_date">
            </div>
            <input type="hidden" name="member_id" id="" class="form-control" value="{{$memberId}}">
            <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
        </Form>
    </div>
    <script>
        $(document).ready(function() {
            // jQuery code here
            $('#vehicle_brand').on('click', function() {
                $('#veicle_model').find('option').remove();
                var $vehicle_brand = $('#vehicle_brand').val();
                $.ajax({
                    url: '/vehicle/get-vehicle-models/'+$vehicle_brand,
                    type: 'GET',
                    success: function(response) {
                        // Handle the response
                        $('#veicle_model').append(response);
                        // console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
