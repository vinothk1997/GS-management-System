@extends('layouts.master')
@section('title','edit infrastructure')
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
        @method('POST')
        <p class="h3">Edit Infrastructure Form</p>
        <div class="form-group">
            <label>Type of Residence:</label>
            <select class="form-control" name="type_of_residence">
                <option @if($infrastructure->type_of_residence=='A' )selected @endif>A</option>
                <option @if($infrastructure->type_of_residence=='B' )selected @endif>B</option>
                <option @if($infrastructure->type_of_residence=='C' )selected @endif>C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Type of House:</label>
            <select class="form-control" name="type_of_house">
                <option @if($infrastructure->type_of_house=='A' )selected @endif>A</option>
                <option @if($infrastructure->type_of_house=='B' )selected @endif>B</option>
                <option @if($infrastructure->type_of_house=='B' )selected @endif>C</option>
            </select>
        </div>
        <label>Type of Roof</label>
        <select name="type_of_roof" class="form-control">
            <option @if($infrastructure->roof=='A' )selected @endif>A</option>
            <option @if($infrastructure->roof=='B' )selected @endif>B</option>
            <option @if($infrastructure->roof=='C' )selected @endif>C</option>
        </select>
        <div class="row">

            <div class="col">
                <div>
                    <label>Lightning availability:</label>
                    <div class="form-check">
                        <input class="form-check-input" name="lightning" type="radio" value="yes"
                            @if($infrastructure->lightning=='yes'
                        )checked @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="lightning" type="radio" value="no"
                            @if($infrastructure->lightning=='no'
                        )checked @endif>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            <div class="col">

                <div>
                    <label>Water availability:</label>
                    <div class="form-check">
                        <input class="form-check-input" name="water_facility" type="radio" value="yes"
                            @if($infrastructure->water_facility=='yes' )checked @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="water_facility" type="radio" value="no"
                            @if($infrastructure->water_facility=='no' )checked @endif>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <label>Sanitary facility availability:</label>
                    <div class="form-check">
                        <input class="form-check-input" name="sanitary_facility" type="radio" value="yes"
                            @if($infrastructure->sanitary_facility=='yes' )checked @endif>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sanitary_facility" type="radio" value="no"
                            @if($infrastructure->sanitary_facility=='no' )checked @endif>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <input type="hidden" name="familyId" placeholder="family id want to be loaded" value="{{$infrastructure->family_id}}">
        </div>
        <button class="btn btn-sm btn-primary my-2" type="submit">Update</button>

    </Form>
</div>

@endsection