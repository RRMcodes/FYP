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
                                                <h5>Event Details</h5>
                                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                            </div>

                                            <div class="card-header">
                                            <a href="{{route('event.create')}}" class="btn btn-primary" action="">Add Events</a>
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">

                                                @if (count($events)===0)
                                                    <h4 style="text-align: center;margin: 10%"> Sorry, No events records to show</h4>

                                                @else
                                                    <table class="table table-striped " id="myTable" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Name</td>
                                                        <td>Description</td>
                                                        <td>Start Date</td>
                                                        <td>End Date</td>
                                                        <td>Location</td>
                                                        <td>Start Time</td>
                                                        <td>End Time</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($events as $key=>$event)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$event->name}}</td>
                                                            <td>{{$event->description}}</td>
                                                            <td>{{$event->start_date}}</td>
                                                            <td>{{$event->end_date}}</td>
                                                            <td>{{$event->location}}</td>
                                                            <td>{{$event->start_time}}</td>
                                                            <td>{{$event->end_time}}</td>

                                                            <td>
                                                                <a href="{{route('event.sendMail',['id'=>$event->id])}}" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></a>
                                                                <a href="{{route('event.edit',['id'=>$event->id])}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                                <a href="{{route('event.delete',['id'=>$event->id])}}" class="btn btn-danger"><i class="fa fa-trash " aria-hidden="true"></i></a>
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

            <script>
                $(document).ready( function () {
                    $('#myTable').DataTable();
                } );
            </script>


@endsection
