@extends('layouts.master')
@section('content')
    <div>
        <h3>Family Head Report</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Age</label>
                    <select name="age" id="age" class="form-control">
                        <option value="">Select Age</option>
                        @for($i=1;$i<=30;$i++){
                            <option value="{{$i}}">{{$i}}</option>
                        }
                        @endfor()
                    </select>
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>Member Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>School</th>
            <th>Type of Learning PLace</th>
            <th>Education</th>
        </tr>
    </table>
    <script>
        var $gender = $('#gender');
        var $age = $('#age');
        var $family_members;
       
        $('#gender').on('change',function(){
            generateFamilyBasedGenderAndAge()

        });

        $('#age').on('change',function(){
            generateFamilyBasedGenderAndAge();
        });

        function generateFamilyBasedGenderAndAge() {
            $.ajax({
                url: 'http://127.0.0.1:8000/Report/generateFamilyBasedGenderAndAge',
                method: 'GET',
                data: {
                    gender: $gender.val(),
                    age: $age.val()
                },
                success: function(response) {
                    $('.data').remove();
                    $family_members='';
                    // Handle successful response
                    console.log(response);
                    response.forEach(function(obj){
                        $family_members=$family_members+'<tr class="data"> <td>'+obj.member_id+'</td><td>'+obj.first_name+'</td><td>'+obj.last_name+'</td><td>'+obj.gender+'</td><td>'+obj.school+'</td><td>'+obj.learning_place_type+'</td><td>'+obj.education+'</td></tr>'
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