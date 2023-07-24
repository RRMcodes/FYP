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
                                        <h4>appointments</h4>
{{--                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>--}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="dt-responsive table-responsive">

                                            @if (count($appointments)===0)
                                                <h4 style="text-align: center;margin: 10%"> Sorry, No appointment records to show</h4>

                                            @else
                                                <table class="table table-striped " id="myTable" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Patient</td>
                                                        <td>Doctor</td>
                                                        <td>specialization</td>
                                                        <td>Appointment date</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($appointments as $key=>$appointment)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$patients->where('id', $appointment->patient_id)->first()->f_name.' '.$patients->where('id', $appointment->patient_id)->first()->l_name}}</td>
                                                            <td>{{'Dr. '.$doctors->where('id', $appointment->doctor_id)->first()->f_name.' '.$doctors->where('id', $appointment->doctor_id)->first()->l_name}}</td>
                                                            <td>{{$appointment->specialist}}</td>
                                                            <td>{{$appointment->appointment_date}}</td>

                                                            <td>
                                                                <a href="" class="btn btn-primary"><i class="fa-solid fa-info"></i></a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>


                                                </table>
                                            @endif
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
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );    </script>
@endsection

