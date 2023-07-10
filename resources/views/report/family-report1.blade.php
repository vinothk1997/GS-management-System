@extends('layouts.master')
@section('content')
    <div>
        <h3>Family Head Report</h3>
    </div>
    <div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" />

                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" disabled />
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC</th>
            <th>Date of birth</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>Permanent Address</th>
            <th>Temporary Address</th>
        </tr>
    </table>
    <script>
        var $start_date = $('#start_date');
        var $end_date = $('#end_date');
        var $family_heads
        $start_date.on('change', function() {
            if ($start_date.length > 0) {
                $('#end_date').prop('disabled', false);
                    $('.data').remove();

                $('#end_date').val('');

            }
        });

        $end_date.on('click', function() {
            $end_date.attr('min', $start_date.val());
        });

        $end_date.on('change',function() {
            if($end_date.length>0){
                getFamilyHeadBasedDOB();
            }
        });

        function getFamilyHeadBasedDOB() {
            $.ajax({
                url: 'http://127.0.0.1:8000/Report/generateFamilyBasedDOB',
                method: 'GET',
                data: {
                    start_date: $start_date.val(),
                    end_date: $end_date.val()
                },
                success: function(response) {
                    $('.data').remove();
                    $family_heads='';
                    // Handle successful response
                    // console.log(response);
                    response.forEach(function(obj){
                        $family_heads=$family_heads+'<tr class="data"> <td>'+obj.first_name+'</td><td>'+obj.last_name+'</td><td>'+obj.nic+'</td><td>'+obj.dob+'</td><td>'+obj.gender+'</td><td>'+obj.mobile+'</td><td>'+obj.permanent_address+'</td><td>'+obj.temporary_address+'</td></tr>'
                    });
                    $('table').append($family_heads);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.log("Error: " + error);
                }
            });
        }
    </script>
@endsection
