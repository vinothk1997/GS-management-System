@extends('layouts.master')
@section('content')
    <div>
        <h3>Tree Report</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Income From</label>
                    <input type="text" id="income_from" name="income_from" class="form-control"
                        onkeypress="return isNumberKey(event);" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Income To</label>
                    <input type="text" id="income_to" name="income_to" class="form-control"
                        onkeypress="return isNumberKey(event);" disabled />
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>Family Id</th>
            <th>Last name</th>
            <th>First Name</th>
            <th>Total Family Income</th>
        </tr>
    </table>
    <script>
        var $income_from = $('#income_from');
        var $income_to = $('#income_to');
        var $family_members;

        $('#income_from').on('input', function() {
            if ($('#income_from').length > 0) {
                $('#income_to').prop('disabled', false);
                generateFamilyIncomeReport();

            }
        });

        

        $('#income_to').on('input', function() {
            generateFamilyIncomeReport();
        });

        function generateFamilyIncomeReport() {
            $.ajax({
                url: 'http://127.0.0.1:8000/Report/generateFamilyIncomeReport',
                method: 'GET',
                data: {
                    income_from: $income_from.val(),
                    income_to: $income_to.val(),
                },
                success: function(response) {
                    $('.data').remove();
                    $family_members = '';

                    console.log(response);
                    response.forEach(function(obj) {
                        $family_members = $family_members + '<tr class="data"> <td>' + obj.family_id +
                            '</td><td>' + obj.last_name + '</td><td>' + obj.first_name + '</td><td>' + obj.income + '</td></tr>'
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
