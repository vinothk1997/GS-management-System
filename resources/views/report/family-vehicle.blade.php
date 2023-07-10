@extends('layouts.master')
@section('content')
    <div>
        <h3>Family Members Vehicle Report</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Vehicle Type</label>
                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                        <option value="">Select Vehicle Type</option>
                        <option value="all">All</option>
                        @foreach($vehicleTypes as $vehicleType)
                        <option value="{{$vehicleType->vehicle_type_id}}">{{$vehicleType->vehicle_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>Identification Id</th>
            <th>Name</th>
            <th>Registered Date</th>
            <th>Vehicle No</th>
        </tr>
    </table>
    <script>
        var $family_members;

        $('#vehicle_type').on('change', function() {
            generateFamilyVehicleReport();
            
        });

        function generateFamilyVehicleReport() {
            $.ajax({
                url: 'http://127.0.0.1:8000/Report/generateFamilyVehicleReport',
                method: 'GET',
                data: {
                    vehicle_type: $('#vehicle_type').val(),
                
                },
                success: function(response) {
                    $('.data').remove();
                    $family_members = '';

                    console.log(response);
                    response.forEach(function(obj) {
                        $family_members = $family_members + '<tr class="data"> <td>' + obj.id +
                            '</td><td>' + obj.name + '</td><td>' + obj.reg_date+ '</td><td>' + obj.reg_no + '</td></tr>'
                    });
                    $('table').append($family_members);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log("Error: " + error);
                }
            });
        }
    </script>
@endsection
