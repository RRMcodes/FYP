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
                                        <h5>Create Doctor record</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('doctor.store')}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">First name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="f_name" id="fname"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Last name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="lname" name="l_name"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address" name="address"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">contact number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="contactNumber" name="contact_number"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date of birth (AD)</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="dob"  required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender-1" value="male" checked> Male
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
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Specialization</label>
                                                <div class="col-sm-10">
{{--                                                    <input type="text" class="form-control" id="specialization" name="specialization"  placeholder="" required>--}}
                                                    <select class="form-control form-select col-sm-4" aria-label="Default select example" name="specialization" id="specialization" required>
                                                        <option >--select--</option>
                                                        <option value="cardiologist"> Cardiologist </option>
                                                        <option value="dermatologist"> Dermatologist </option>
                                                        <option value="dermatologist"> ENT Specialist </option>
                                                        <option value="dermatologist"> Rheumatologist </option>
                                                        <option value="dermatologist"> Gynecologist </option>
                                                        <option value="gastroenterologist"> Gastroenterologist </option>
                                                        <option value="neurologist"> Neurologist </option>
                                                        <option value="neurologist"> Nephrologist </option>
                                                        <option value="ophthalmologist"> Ophthalmologist </option>
                                                        <option value="orthopedic"> Orthopedic  Surgeon</option>
                                                        <option value="pediatrician"> Pediatrician </option>
                                                        <option value="psychiatrist"> Psychiatrist </option>
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
{{--                                                    <input type="text" class="form-control" id="status" name="status"  placeholder="" required>--}}
                                                    <select class="form-control form-select col-sm-4" aria-label="Default select example" name="status" id="status" required>
                                                        <option value="part-time" >Part-time</option>
                                                        <option value="full-time" >Full-time</option>
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Experience</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="experience" name="experience"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Start Date</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="start_date"  required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">End Date</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="end_date"  >
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-6 ">

                                                <div class="card-header ml-4">
                                                    <h4>Schedule</h4>
                                                </div>

                                                <div class="form-group row m-l-4">
                                                    <label class="col-sm-10">select day and time</label>

                                                </div>
                                                <div class="col-sm-10 ">
                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="sunday" value="sunday">
                                                            <label class="form-check-label" for="sunday"><h5>Sunday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value=""/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value=""/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="monday" value="monday">
                                                            <label class="form-check-label" for="monday"><h5>monday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]"/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]"/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="tuesday" value="tuesday">
                                                            <label class="form-check-label" for="tuesday"><h5>tuesday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]"/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]"/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="m-4">

                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="wednesday" value="wednesday">
                                                            <label class="form-check-label" for="wednesday"><h5>wednesday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]"/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="sunday">To</label>
                                                                    <input class="form-control" type="time" name="to[]"/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="thursday" value="thursday">
                                                            <label class="form-check-label" for="thursday"><h5>thursday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]"/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="friday">To</label>
                                                                    <input class="form-control" type="time" name="to[]"/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="friday" value="friday">
                                                            <label class="form-check-label" for="friday"><h5>friday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]"/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="friday">To</label>
                                                                    <input class="form-control" type="time" name="to[]"/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="saturday" value="saturday">
                                                            <label class="form-check-label" for="saturday"><h5>saturday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]"/>                                                            </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]"/>                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('doctor.index') }}" class="btn btn-danger">Back</a>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-sm-5">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h5>Schedule</h5>--}}
{{--                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-block">--}}
{{--                                        <form id="main" method="post" action="{{route('doctor.store', )}}" >--}}
{{--                                            {{csrf_field()}}--}}


{{--                                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

