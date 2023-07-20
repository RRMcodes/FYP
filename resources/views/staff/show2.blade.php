
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
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <!-- Profile picture card-->
                                                <div class="card mb-4 mb-xl-0">
                                                    <div class="card-header">Profile Picture</div>
                                                    <div class="card-body text-center">
                                                        <!-- Profile picture image-->
                                                        <img class="img-account-profile rounded-circle mb-2" src="" alt="image">
                                                        <!-- Profile picture help block-->
                                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                                        <!-- Profile picture upload button-->
                                                        <button class="btn btn-primary" type="button">Upload new image</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8">
                                                <!-- Account details card-->
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <form>
                                                            <!-- Form Row-->
                                                            <div class="row gx-3 mb-3">
                                                                <!-- Form Group (first name)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                                                                </div>
                                                                <!-- Form Group (last name)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                                                                </div>
                                                            </div>
                                                            <!-- Form Row        -->
                                                            <div class="row gx-3 mb-3">
                                                                <!-- Form Group (location)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputLocation">Location</label>
                                                                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                                                                </div>
                                                                <!-- Form Group (birthday)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputBirthday">Date of Birth</label>
                                                                    <input class="form-control" type="date" name="dob" value="" required>
                                                                </div>


                                                            </div>
                                                            <!-- Form Group (email address)-->
                                                            <div class="mb-3">
                                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                                                            </div>
                                                            <!-- Form Row-->
                                                            <div class="row gx-3 mb-3">
                                                                <!-- Form Group (phone number)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                                                                </div>
                                                                <!-- Form Group (position)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputOrgName">Position</label>
                                                                    <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                                                                </div>

                                                            </div>
                                                            <!-- Form Row-->
                                                            <div class="row gx-3 mb-3">
                                                                <!-- Form Group (Experience)-->
                                                                <div class="col-md-3">
                                                                    <label class="small mb-1" for="inputPhone">Experience</label>
                                                                    <input class="form-control" id="inputPhone" type="number" placeholder="Enter your phone number" value="3">
                                                                </div>

                                                                <!-- Form Group (Experience)-->
                                                                <div class="col-md-4">
                                                                    <label class="small mb-1" for="inputPhone">Status</label>
                                                                    <input class="form-control" id="inputPhone" type="number" placeholder="part-time" value="">
                                                                </div>

                                                                <!-- Form Group (Gender)-->
                                                                <div class="col-md-5">
                                                                    <label class="small mb-1" for="inputOrgName">Gender</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input" type="radio" name="gender" id="gender-1" value="male" {{ $staff->gender == 'male' ? 'checked' : '' }}> Male
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input" type="radio" name="gender" id="gender-2" value="female" {{ $staff->gender == 'female' ? 'checked' : '' }}> Female
                                                                            </label>
                                                                        </div>
                                                                        <span class="messages"></span>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="row gx-3 mb-3">
                                                                <!-- Form Group (Start date)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputBirthday">Start date</label>
                                                                    <input class="form-control" type="date" name="dob" value="" required>
                                                                </div>
                                                                <!-- Form Group (End date)-->
                                                                <div class="col-md-6">
                                                                    <label class="small mb-1" for="inputBirthday">End date</label>
                                                                    <input class="form-control" type="date" name="dob" value="" >
                                                                </div>

                                                            </div>

                                                            <!-- Save changes button-->
                                                            <div class="card-footer text-right">
                                                                <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-primary">Save</a>
                                                                <a href="{{ route('staff.index') }}" class="btn btn-danger">Back</a>
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
        </div>
    </div>

@endsection