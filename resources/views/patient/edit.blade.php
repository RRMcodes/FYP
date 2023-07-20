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
                                        <h5>Update Patient record</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('patient.store')}}" novalidate>
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">First name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="f_name" id="fname" value="{{$patient->f_name}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Last name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="lname" name="l_name" value="{{$patient->l_name}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$patient->address}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$patient->email}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">contact number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="contactNumber" name="contact_number" value="{{$patient->contact_number}}"placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date of birth (AD)</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" value="{{$patient->dob}}" name="dob" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Blood group</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="bloodGroup" name="blood_group" value="{{$patient->blood_group}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender-1" value="male" {{ $patient->gender == 'male' ? 'checked' : '' }}> Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender-2" value="female" {{ $patient->gender == 'female' ? 'checked' : '' }}> Female
                                                        </label>
                                                    </div>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('patient.index') }}" class="btn btn-danger">Back</a>

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
@endsection
