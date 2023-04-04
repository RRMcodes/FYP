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
                                        <h3>Patient Details</h3>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><h4>First Name</h4></label>
                                                    <p>{{ $patient->f_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Last Name</h4></label>
                                                    <p>{{ $patient->l_name }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Address</h4></label>
                                                    <p>{{ $patient->address }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Email</h4></label>
                                                    <p>{{ $patient->email }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Contact Number</h4></label>
                                                    <p>{{ $patient->contact_number }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><h4>Date of Birth</h4></label>
                                                    <p>{{ $patient->dob }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Blood Group</h4></label>
                                                    <p>{{ $patient->blood_group }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><h4>Gender</h4></label>
                                                    <p>{{ $patient->gender }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('patient.index') }}" class="btn btn-danger">Back</a>
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
