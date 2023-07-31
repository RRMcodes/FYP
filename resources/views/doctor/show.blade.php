@extends('layouts.app')

@section('content')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h3>Doctor Details</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row mt-3 m-1">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label><h4>First Name</h4></label>
                                                    <p>{{ $doctor->f_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Last Name</h4></label>
                                                    <p>{{ $doctor->l_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Address</h4></label>
                                                    <p>{{ $doctor->address }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Email</h4></label>
                                                    <p>{{ $doctor->email }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Contact Number</h4></label>
                                                    <p>{{ $doctor->contact_number }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Date of Birth</h4></label>
                                                    <p>{{ $doctor->dob }}</p>
                                                </div>

                                            </div>
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label><h4>Gender</h4></label>
                                                    <p>{{ $doctor->gender }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Specialization</h4></label>
                                                    <p>{{ $doctor->specialization }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Status</h4></label>
                                                    <p>{{ $doctor->status }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Experience</h4></label>
                                                    <p>{{ $doctor->experience }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Start Date</h4></label>
                                                    <p>{{ $doctor->start_date }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>End Date</h4></label>
                                                    <p>{{ $doctor->end_date }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('doctor.index') }}" class="btn btn-danger">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
