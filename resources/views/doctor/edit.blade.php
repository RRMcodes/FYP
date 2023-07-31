@extends('layouts.app')
@section('content')
    <div class="pcoded-content">

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Doctor record</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('doctor.update',["id"=>$doctor->id] )}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">First name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="f_name" id="fname" value="{{$doctor->f_name}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Last name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="lname" name="l_name" value="{{$doctor->l_name}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$doctor->address}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$doctor->email}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">contact number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="contactNumber" name="contact_number" value="{{$doctor->contact_number}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Date of birth (AD)</label>
                                                <div class="col-sm-8 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="dob" value="{{$doctor->dob}}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender-1" value="male" {{ $doctor->gender == 'male' ? 'checked' : '' }}> Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender-2" value="female" {{ $doctor->gender == 'female' ? 'checked' : '' }}> Female
                                                        </label>
                                                    </div>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Specialization</label>
                                                <div class="col-sm-8">
{{--                                                    <input type="text" class="form-control" id="position" name="specialization" value="{{$doctor->specialization}}" placeholder="" required>--}}
                                                    <select class="form-control form-select col-sm-6" aria-label="Default select example" name="specialization" id="specialization" required>
                                                        <option >--select--</option>
                                                        <option value="cardiologist" {{ $doctor->specialization == 'cardiologist' ? 'selected' : '' }}>Cardiologist</option>
                                                        <option value="dermatologist" {{ $doctor->specialization == 'dermatologist' ? 'selected' : '' }}>Dermatologist</option>
                                                        <option value="dermatologist" {{ $doctor->specialization == 'ent specialist' ? 'selected' : '' }}>ENT Specialist</option>
                                                        <option value="dermatologist" {{ $doctor->specialization == 'rheumatologist' ? 'selected' : '' }}>Rheumatologist</option>
                                                        <option value="dermatologist" {{ $doctor->specialization == 'gynecologist' ? 'selected' : '' }}>Gynecologist</option>
                                                        <option value="gastroenterologist" {{ $doctor->specialization == 'gastroenterologist' ? 'selected' : '' }}>Gastroenterologist</option>
                                                        <option value="neurologist" {{ $doctor->specialization == 'neurologist' ? 'selected' : '' }}>Neurologist</option>
                                                        <option value="neurologist" {{ $doctor->specialization == 'nephrologist' ? 'selected' : '' }}>Nephrologist</option>
                                                        <option value="ophthalmologist" {{ $doctor->specialization == 'ophthalmologist' ? 'selected' : '' }}>Ophthalmologist</option>
                                                        <option value="orthopedic" {{ $doctor->specialization == 'orthopedic' ? 'selected' : '' }}>Orthopedic Surgeon</option>
                                                        <option value="pediatrician" {{ $doctor->specialization == 'pediatrician' ? 'selected' : '' }}>Pediatrician</option>
                                                        <option value="psychiatrist" {{ $doctor->specialization == 'psychiatrist' ? 'selected' : '' }}>Psychiatrist</option>
                                                    </select>

                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-8">
{{--                                                    <input type="text" class="form-control" id="status" name="status" value="{{$doctor->status}}" placeholder="" required>--}}
                                                    <select class="form-control form-select col-sm-6" aria-label="Default select example" name="status" id="status" required>
                                                        <option value="part-time" {{ $doctor->status == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                                        <option value="full-time" {{ $doctor->status == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                                    </select>

                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Experience</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="experience" name="experience" value="{{$doctor->experience}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Start Date</label>
                                                <div class="col-sm-8 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="start_date" value="{{$doctor->start_date}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">End Date</label>
                                                <div class="col-sm-8 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="end_date" value="{{$doctor->end_date}}" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3"></label>
                                                <div class="col-sm-8">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('doctor.index') }}" class="btn btn-danger">Back</a>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Schedule</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('doctor.update',["id"=>$doctor->id] )}}" >
                                            {{csrf_field()}}


                                            <div class="form-group row">
                                                <label class="col-sm-10">select day and time</label>
                                                <div class="col-sm-10 ">
                                                    <div class="m-4">
                                                        <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="days[]" id="sunday" value="sunday" {{ (isset(json_decode($doctor->schedule)->sunday) ? 'checked' : '') }}>
                                                                <label class="form-check-label" for="sunday"><h5>Sunday</h5></label>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label" for="">From</label>
                                                                        <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->sunday) ? json_decode($doctor->schedule)->sunday->from : ''}}"/>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label" for="">To</label>
                                                                        <input class="form-control" type="time" name="to[]" value="{{ isset(json_decode($doctor->schedule)->sunday) ? json_decode($doctor->schedule)->sunday->to : ''}}"/>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">

                                                            <input type="checkbox" class="form-check-input" name="days[]" id="monday" value="monday" {{ (isset(json_decode($doctor->schedule)->monday) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="monday"><h5>monday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->monday) ? json_decode($doctor->schedule)->monday->from : ''}}"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value="{{ isset(json_decode($doctor->schedule)->monday) ? json_decode($doctor->schedule)->monday->to : ''}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">

                                                            <input type="checkbox" class="form-check-input" name="days[]" id="tuesday" value="tuesday" {{ (isset(json_decode($doctor->schedule)->tuesday) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="tuesday"><h5>tuesday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->tuesday) ? json_decode($doctor->schedule)->tuesday->from : ''}}"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value="{{isset(json_decode($doctor->schedule)->tuesday) ? json_decode($doctor->schedule)->tuesday->to:''}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="m-4">

                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="wednesday" value="wednesday" {{ (isset(json_decode($doctor->schedule)->wednesday) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="wednesday"><h5>wednesday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->wednesday) ? json_decode($doctor->schedule)->wednesday->from : ''}}"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value="{{isset(json_decode($doctor->schedule)->wednesday) ? json_decode($doctor->schedule)->wednesday->to:''}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="thursday" value="thursday" {{ (isset(json_decode($doctor->schedule)->thursday) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="thursday"><h5>thursday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->thursday) ? json_decode($doctor->schedule)->thursday->from : ''}}"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value="{{isset(json_decode($doctor->schedule)->thursday) ? json_decode($doctor->schedule)->thursday->to:''}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="friday" value="friday" {{ (isset(json_decode($doctor->schedule)->friday) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="friday"><h5>friday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->friday) ? json_decode($doctor->schedule)->friday->from : ''}}"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value="{{isset(json_decode($doctor->schedule)->friday) ? json_decode($doctor->schedule)->friday->to:''}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="days[]" id="saturday" value="saturday" {{ (isset(json_decode($doctor->schedule)->saturday) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="saturday"><h5>saturday</h5></label>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">From</label>
                                                                    <input class="form-control" type="time"  name="from[]" value="{{ isset(json_decode($doctor->schedule)->saturday) ? json_decode($doctor->schedule)->saturday->from : ''}}"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-label" for="">To</label>
                                                                    <input class="form-control" type="time" name="to[]" value="{{isset(json_decode($doctor->schedule)->saturday) ? json_decode($doctor->schedule)->saturday->to:''}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
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
