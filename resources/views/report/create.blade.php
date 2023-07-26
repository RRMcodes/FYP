@extends('layouts.app')
@section('content')
    <div class="pcoded-content">

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">


                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Events</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" enctype="multipart/form-data" action="{{route('report.store')}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Patient Name</label>
                                                <div class="col-sm-10">
                                                    <select class="col-sm-4 form-control dropdown" name="patient_id" id="patient_name" required>
                                                        <option value="" disabled selected>--Select--</option>
                                                        @foreach ($patients as $patient)
                                                            <option value="{{$patient->id}}" data-dob="{{$patient->dob}}" data-contact_number="{{$patient->contact_number}}" data-address="{{$patient->address}}" data-blood_group="{{$patient->blood_group}}">{{ucwords($patient->f_name.' '.$patient->l_name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Test name</label>
                                                <div class="col-sm-10">
                                                    <select class="col-sm-4 form-control dropdown" name="test" id="test" required>
                                                        <option value="" disabled selected>--Select--</option>
                                                        @foreach ($services as $service)
                                                            <option value="{{$service->id}}" >{{$service->name}} ({{$service->abbreviation}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Report File</label>
                                                <div class="col-sm-5">
                                                    <input  class="form-control" type="file" name="pdf">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('report.index') }}" class="btn btn-danger">Back</a>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function() {

            $('.dropdown').select2();
        });


    </script>
@endsection

