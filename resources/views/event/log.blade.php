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
                                        <h4>Event Log</h4>
                                        {{--                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>--}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="dt-responsive table-responsive">

                                            @if (count($eventLogs)===0)
                                                <h4 style="text-align: center;margin: 10%"> Sorry, No billing records to show</h4>

                                            @else
                                                <table class="table table-striped " id="myTable" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Event ID</td>
                                                        <td>Event Name</td>
                                                        <td>Start Date</td>
                                                        <td>Event Date</td>
                                                        <td>Notification Date</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($eventLogs as $key=>$eventLog)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$eventLog->event_id}}</td>
                                                            <td>{{$eventLog->event_name}}</td>
                                                            <td>{{$eventLog->start_date}}</td>
                                                            <td>{{$eventLog->end_date}}</td>
                                                            <td>{{$eventLog->date}}</td>
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
        } );
    </script>

@endsection

