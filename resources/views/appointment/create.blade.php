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
                                        <h5>Create New Appointment</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('appointment.store')}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Patient Name</label>
                                                <div class="col-sm-10">
                                                    <select class="col-sm-4" name="patient_id" id="patient_name" required>
                                                        <option value="" disabled selected>--Select--</option>
                                                        @foreach ($patients as $patient)
                                                            <option value="{{$patient->id}}" data-dob="{{$patient->dob}}" data-contact_number="{{$patient->contact_number}}" data-address="{{$patient->address}}" data-blood_group="{{$patient->blood_group}}">{{ucwords($patient->f_name.' '.$patient->l_name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Specialist</label>
                                                <div class="col-sm-10">
                                                    <select class="col-sm-4 " name="specialist" id="specialist" required>
                                                        <option value="" disabled selected >--Select--</option>
                                                        @foreach ($doctors->unique('specialization') as $doctor)
                                                            <option value="{{ $doctor->specialization }}">{{ $doctor->specialization }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date </label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="date" id="date" min="{{ now()->format('Y-m-d') }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Available Doctors</label>

                                                <div class="col-sm-10">
                                                    <select class="col-sm-4 " name="doctor_id" id="doctor_name" required>
                                                        <option value="" disabled selected >--Select--</option>
                                                    </select>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('appointment.index') }}" class="btn btn-danger">Back</a>

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

            $('#specialist').select2();
            $('#patient_name').select2();
            $('#doctor_name').select2();

            $(document).on("change", "#specialist", function () {
                getDoctors();
            });

            $(document).on("change", "#date", function () {
                               getDoctors();
            });

            function getDoctors() {
                var date = $('#date').val();

                var dateObject = new Date(date); // Create a new Date object from the selected date value
                var day = dateObject.getDay(); // Extract the day value from the date object


                var doctors = {!! json_encode($doctors) !!};

                var daysArray = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];

                var specialist = $('#specialist').val();

                var filteredDoctors = doctors.filter(function (doctor) {
                    if (doctor.specialization === specialist && doctor.schedule.includes(daysArray[day])) {
                        // console.log(doctor);
                    }
                    return doctor.specialization === specialist && doctor.schedule.includes(daysArray[day]);
                });

                console.log(specialist, filteredDoctors, day, daysArray[day]);

                var $doctorNameDropdown = $("#doctor_name");
                $doctorNameDropdown.empty(); // Clear existing options
                $doctorNameDropdown.append($('<option>', {
                    value: "",
                    text: "--Select--"
                }).prop("disabled", true).prop("selected", true)); // Add a default option

                // Loop through the filteredDoctors and add options to the "Available Doctors" dropdown
                $.each(filteredDoctors, function (index, doctor) {
                    console.log(doctor);

                    from_string = JSON.parse(doctor.schedule)[daysArray[day]].from
                    var from_Parts = from_string.split(":");
                    from_time = new Date();
                    from_time.setHours(from_Parts[0]);
                    from_time.setMinutes(from_Parts[1]);
                    var from = from_time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

                    to_string = JSON.parse(doctor.schedule)[daysArray[day]].to;
                    var to_Parts = to_string.split(":");
                    to_time = new Date();
                    to_time.setHours(to_Parts[0]);
                    to_time.setMinutes(to_Parts[1]);
                    var to = to_time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

                    $doctorNameDropdown.append($('<option>', {
                        value: doctor.id,
                        text: doctor.f_name + " " + doctor.l_name + " from: " + from + " to: " + to
                    }));
                });
                $doctorNameDropdown.select2();

            }

        });

    </script>
@endsection

