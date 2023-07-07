@extends('layouts.master')
@section('title', 'edit-vehicle')
@section('content')
    <div class="container mt-3">
        <p class="h3">Edit Vehicle Form</p>
        <form action="{{ route('familyMember.show') }}">
            <input type="hidden" name="memberId" value="{{ $vehicle->member_id }}">
            <input type="submit" class="btn btn-primary my-2 btn-sm" value="Back" />
        </form>
        <Form action="{{ route('vehicle.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Vehicle Brand:</label>
                <select class="form-control" name="vehicle_brand" id="vehicle_brand">
                    <option>select brand</option>
                    @foreach ($vehicleBrands as $vehicleBrand)
                        <option value={{ $vehicleBrand->brand_id }} @if ($vehicleBrand->brand_id == $vehicle->VehicleModel->VehicleBrand->brand_id) selected @endif>
                            {{ $vehicleBrand->brand }}</option>
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
                <input type="text" class="form-control" name="reg_no" value="{{ $vehicle->reg_no }}">
            </div>
            <div class="form-group">
                <label>Registration Date:</label>
                <input type="date" class="form-control" name="reg_date" value="{{ $vehicle->reg_date }}">
            </div>
            <input type="hidden" name="member_id" id="" class="form-control" value="{{ $vehicle->member_id }}">
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
                    url: '/vehicle/get-vehicle-models/' + $vehicle_brand,
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
            var model_id = <?php echo json_encode($vehicle->model_id); ?>;
            var model_name = <?php echo json_encode($vehicle->vehicleModel->name); ?>;
            var option = "<option value='" + model_id + "'>" + model_name + "</option>";
            $('#veicle_model').append(option);
        });
    </script>
@endsection
