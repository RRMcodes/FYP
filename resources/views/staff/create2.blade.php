
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
                        <form method="post" action="{{ route('staff.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <!-- Profile picture card-->
                                        <div class="card mb-4 mb-xl-0">
                                            <div class="card-header">Profile Picture</div>
                                            <div class="card-body text-center">
                                                <!-- Profile picture image-->
                                                <img class="img-account-profile mb-2" src="{{asset('images/upload-image-icon.webp')}}" width="50%" alt="image">
                                                <!-- Profile picture upload button-->

                                                <input type="file" class="form-control" name="image" accept="image/*">
{{--                                                <button class="btn btn-primary" type="button">save</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <!-- Account details card-->
                                        <div class="card mb-4">
                                            <div class="card-body">

                                                    <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputFirstName">First name</label>
                                                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="f_name" value="" required>
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputLastName">Last name</label>
                                                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="l_name" value="" required>
                                                        </div>
                                                    </div>
                                                    <!-- Form Row        -->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (location)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputLocation">Address</label>
                                                            <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" name="address" value="" required>
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
                                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="email" value="" required>
                                                    </div>
                                                    <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (phone number)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputPhone">Phone number</label>
                                                            <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="contact_number" value="" required>
                                                        </div>
                                                        <!-- Form Group (position)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputOrgName">Position</label>
                                                            <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your position" name="position" value="" required>
                                                        </div>

                                                    </div>
                                                    <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (Experience)-->
                                                        <div class="col-md-3">
                                                            <label class="small mb-1" for="inputPhone">Experience (years)</label>
                                                            <input class="form-control" id="inputPhone" type="number" placeholder="Example: 4" name="experience" value="" required>
                                                        </div>

                                                        <!-- Form Group (Experience)-->
                                                        <div class="col-md-4">
                                                            <label class="small mb-1" for="inputPhone">Status</label>
                                                            <select class="form-control form-select" aria-label="Default select example" name="status" id="inputStatus" required>
                                                                <option value="part-time" >Part-time</option>
                                                                <option value="full-time" >Full-time</option>
                                                            </select>
                                                        </div>

                                                        <!-- Form Group (Gender)-->
                                                        <div class="col-md-5">
                                                            <label class="small mb-1" for="inputOrgName">Gender</label>
                                                            <div class="col-sm-10">
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="radio" name="gender" id="gender-1" value="male"> Male
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="radio" name="gender" id="gender-2" value="female" > Female
                                                                    </label>
                                                                </div>
                                                                <span class="messages"></span>
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (Start date)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="start_date">Start date</label>
                                                            <input class="form-control" type="date" name="start_date" value="" required>
                                                        </div>
                                                        <!-- Form Group (End date)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="end_date">End date</label>
                                                            <input class="form-control" type="date" name="end_date" value="" >
                                                        </div>

                                                    </div>

                                                    <!-- Save changes button-->
                                                    <div class="card-footer text-right">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <a href="{{ route('staff.index') }}" class="btn btn-danger">Back</a>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
