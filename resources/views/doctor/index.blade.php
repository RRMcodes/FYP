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
                                                <h5>List of Doctors records</h5>
                                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                            </div>

                                            <div class="card-header">
                                            <a href="{{route('doctor.create')}}" class="btn btn-primary" action="">Add Record</a>
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">

                                                @if (count($doctors)===0)
                                                    <h4 style="text-align: center;margin: 10%"> Sorry, No doctors records to show</h4>

                                                @else
                                                    <table class="table table-striped " id="myTable" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>First Name</td>
                                                        <td>Last Name</td>
                                                        <td>Address</td>
                                                        <td>Contact Number</td>
                                                        <td>Action</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($doctors as $key=>$doctor)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$doctor->f_name}}</td>
                                                            <td>{{$doctor->l_name}}</td>
                                                            <td>{{$doctor->address}}</td>
                                                            <td>{{$doctor->contact_number}}</td>
                                                            <td>
                                                                <a href="{{route('doctor.show',['id'=>$doctor->id])}}" class="btn btn-primary"><i class="fa-solid fa-info"></i></a>
                                                                <a href="{{route('doctor.edit',['id'=>$doctor->id])}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                                <a href="{{route('doctor.delete',['id'=>$doctor->id])}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
