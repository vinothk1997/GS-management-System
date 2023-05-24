@extends('layouts.master')
@section('title','add infrastructure')
@section('content')
<div class="container">
    <div class="my-2">
        <form class="d-inline" action="{{route('familyHead.show')}}" method="GET">
            <input type="hidden" value="{{$family_id}}" name="familyId"/>
            <input type="submit" class="btn btn-sm btn-primary" value="Back">
        </form>
    </div>
    <Form action="{{route('infrastructure.store')}}" method="POST">
        @csrf
        <p class="h3">Add Infrastructure Form</p>
        <div class="form-group">
            <label>Type of Residence:</label>
            <select class="form-control" name="type_of_residence">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Type of House:</label>
            <select class="form-control" name="type_of_house">
                <option>A</option>
                <option>B</option>
                <option>C</option>
            </select>
        </div>
        <label>Type of Roof</label>
        <select name="type_of_roof" class="form-control">
            <option>A</option>
            <option>B</option>
            <option>C</option>
        </select>
        <div class="row">

            <div class="col">
                <div>
                    <label>Lightning availability:</label>
                    <div class="form-check">
                        <input class="form-check-input" name="lightning" type="radio" value="yes" checked>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="lightning" type="radio" value="no">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            <div class="col">

                <div>
                    <label>Water availability:</label>
                    <div class="form-check">
                        <input class="form-check-input" name="water_facility" type="radio" value="yes" checked>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="water_facility" type="radio" value="no">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <label>Sanitary facility availability:</label>
                    <div class="form-check">
                        <input class="form-check-input" name="sanitary_facility" type="radio" value="yes" checked>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sanitary_facility" type="radio" value="no">
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <input type="hidden" name="familyId" placeholder="family id want to be loaded" value="{{$family_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Add</button>

    </Form>
</div>

@endsection