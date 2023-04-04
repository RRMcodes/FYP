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
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>List of Patients Records</h5>
                                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                            </div>

                                            <div class="card-header">
                                            <a href="{{route('patient.create')}}" class="btn btn-primary" action="">Add Patient</a>
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">

                                                @if (count($patients)===0)
                                                    <h4 style="text-align: center;margin: 10%"> Sorry, No patients records to show</h4>

                                                @else
                                                <table class="table table-striped table-bordered nowrap" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>First Name</td>
                                                        <td>Last Name</td>
                                                        <td>Address</td>
                                                        <td>Email</td>
                                                        <td>Contact Number</td>
                                                        <td>Date of birth</td>
                                                        <td>Blood group</td>
                                                        <td>gender</td>
                                                        <td>Action</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($patients as $key=>$patient)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$patient->f_name}}</td>
                                                            <td>{{$patient->l_name}}</td>
                                                            <td>{{$patient->address}}</td>
                                                            <td>{{$patient->email}}</td>
                                                            <td>{{$patient->contact_number}}</td>
                                                            <td>{{$patient->dob}}</td>
                                                            <td>{{$patient->blood_group}}</td>
                                                            <td>{{$patient->gender}}</td>
                                                            <td>
                                                                <a href="{{route('patient.show',['id'=>$patient->id])}}" class="btn btn-primary"><i class="fa-solid fa-info"></i></a>
                                                                <a href="{{route('patient.edit',['id'=>$patient->id])}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                                <a href="{{route('patient.delete',['id'=>$patient->id])}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        {{--            {{ $events->links() }}--}}


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                pageLength: 8,
                ajax : '{{route('patient.getPatientsJson')}}',
                columns: [
                    { data: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },name: "sn", searchable: false ,orderable:false},
                    {data:"name", name:"name"},
                    {data: "type", name: "type"},
                    {data: "start_date", name: "start_date"},
                    {data: "end_date", name: "end_date"},
                    {data: "details", name: "details"},
                    {data: "quantity", name: "quantity"},
                    {data: "quantity", name: "quantity"},
                    {data: "quantity", name: "quantity"},


                    {{--{ data: function(data,b,c,table) {--}}
                    {{--        var buttons = '';--}}
                    {{--        buttons += "<a class='btn btn-sm btn-primary'  href='{{route('patient.edit',array('id'=>false))}}"+"/"+data.id+"' type='button' title='Edit'><i class='fa fa-edit'></i></a>&nbsp";--}}
                    {{--        buttons += "<a class='btn btn-sm btn-primary'  href='{{route('patient.show',array('id'=>false))}}"+"/"+data.id+"' type='button' title='Show'> Issue</a>&nbsp";--}}
                    {{--        buttons += "<a type='button'  data-id='"+data.id+"' class='btn btn-sm btn-danger del' title='Delete' ><i class='fa fa-trash'></i></a>";--}}
                    {{--        return buttons;--}}
                    {{--    }, name:'action',searchable: false,orderable: false},--}}
                ]
            });
        } );

        {{--$(document).on('click','.del',function (){--}}
        {{--    var id = $(this).data('id');--}}
        {{--    alertify.confirm('Delete?', 'Are You Sure you want to delete this record?', function(){	$.get("{{route('patient.delete',array('id'=>false))}}"+"/"+id,function (d) {--}}
        {{--            alertify.success("Record Deleted");--}}
        {{--            $('#myTable').DataTable().ajax.reload();--}}
        {{--        });}--}}
        {{--        , function(){ });--}}
        {{--});--}}

        function edited () {
            alertify.success('Record edited');
        }
    </script>


@endsection
