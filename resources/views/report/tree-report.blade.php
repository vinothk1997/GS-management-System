@extends('layouts.master')
@section('content')
    <div>
        <h3>Tree Report</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Tree Name</label>
                    @php 
                    $trees=['All','Apple','Mango','Banana'];
                    @endphp
                    <select name="tree_name" id="tree_name" class="form-control">
                        <option value="">Select Tree</option>
                        @foreach($trees as $tree){
                            <option value="{{$tree}}">{{$tree}}</option>
                        }
                        @endforeach()
                    </select>
                </div>
            </div>
        </div>

    </div>
    <table style="width:100%" class="table table-bordered">
        <tr>
            <th>Type of Tree</th>
            <th>Count</th>
        </tr>
    </table>
    <script>
        var $tree_name = $('#tree_name');
        var $family_members;
       
        $('#tree_name').on('change',function(){
            generateTreeReport();
        });

        function generateTreeReport() {
            $.ajax({
                url: 'http://127.0.0.1:8000/Report/generateTreeReport',
                method: 'GET',
                data: {
                    tree_name: $tree_name.val(),
                },
                success: function(response) {
                    $('.data').remove();
                    $family_members='';
             
                    console.log(response);
                    response.forEach(function(obj){
                        $family_members=$family_members+'<tr class="data"> <td>'+obj.tree_name+'</td><td>'+obj.total+'</td></tr>'
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