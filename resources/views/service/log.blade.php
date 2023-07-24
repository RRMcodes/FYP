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
                                        <h4>Service Log</h4>
                                        {{--                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>--}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="dt-responsive table-responsive">

                                            @if (count($serviceLogs)===0)
                                                <h4 style="text-align: center;margin: 10%"> Sorry, No billing records to show</h4>

                                            @else
                                                <table class="table table-striped " id="myTable" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Billing ID</td>
                                                        <td>Service Name</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($serviceLogs as $key=>$serviceLog)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$serviceLog->billing_id}}</td>
                                                            <td>{{$services->where('id', $serviceLog->service_id)->first()->name}}</td>
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
        } );
    </script>

@endsection

