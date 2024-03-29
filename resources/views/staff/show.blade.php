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
                                        <h3>Staff Details</h3>
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
                                                <div style="position: relative; width: 150px; height: 150px;">
                                                    <img src="{{ asset('images/img2.jfif') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label><h4>First Name</h4></label>
                                                    <p>{{ $staff->f_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Last Name</h4></label>
                                                    <p>{{ $staff->l_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Address</h4></label>
                                                    <p>{{ $staff->address }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Email</h4></label>
                                                    <p>{{ $staff->email }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Contact Number</h4></label>
                                                    <p>{{ $staff->contact_number }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Date of Birth</h4></label>
                                                    <p>{{ $staff->dob }}</p>
                                                </div>

                                            </div>
                                            <div class="col-md-4">

                                            <div class="form-group">
                                                <label><h4>Gender</h4></label>
                                                    <p>{{ $staff->gender }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Position</h4></label>
                                                    <p>{{ $staff->position }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Status</h4></label>
                                                    <p>{{ $staff->status }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Experience</h4></label>
                                                    <p>{{ $staff->experience }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Start Date</h4></label>
                                                    <p>{{ $staff->start_date }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>End Date</h4></label>
                                                    <p>{{ $staff->end_date }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('staff.index') }}" class="btn btn-danger">Back</a>
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
