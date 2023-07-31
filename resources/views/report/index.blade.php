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
                                                <h5>Report Details</h5>
                                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                            </div>

                                            <div class="card-header">
                                                @if(\Illuminate\Support\Facades\Auth::user()->role == 'staff')

                                                <a href="{{route('report.create')}}" class="btn btn-primary" action="">Add Reports</a>
                                                @endif
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">

                                                @if (count($reports)===0)
                                                    <h4 style="text-align: center;margin: 10%"> Sorry, No reports records to show</h4>

                                                @else
                                                    <table class="table table-striped " id="myTable" width="100%" >
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Patient ID</td>
                                                        <td>Test</td>
                                                        <td>File</td>
                                                        <td>Status</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($reports as $key=>$report)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$report->f_name}} {{$report->l_name}}</td>
                                                            <td>{{$report->test_name}} ({{$report->abbreviation}})</td>
                                                            <td>{{$report->file}}</td>
                                                            <td>{{$report->status}}</td>
                                                            <td>
                                                                <a href="{{asset('reports/'.$report->file)}}" class="btn btn-secondary"><i class="fa-solid fa-info"></i></a>

                                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'staff')
                                                                <a href="{{route('report.sendMail',['id'=>$report->id])}}" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></a>
                                                                    <a href="{{route('report.delete',['id'=>$report->id])}}" class="btn btn-danger"><i class="fa fa-trash " aria-hidden="true"></i></a>

                                                                @endif
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
