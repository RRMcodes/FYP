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
                                                        <td>gender</td>
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
                                                            <td>{{$doctor->email}}</td>
                                                            <td>{{$doctor->contact_number}}</td>
                                                            <td>{{$doctor->dob}}</td>
                                                            <td>{{$doctor->gender}}</td>
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
        {{--            {{ $events->links() }}--}}


{{--    <script>--}}
{{--        $(document).ready( function () {--}}
{{--            $('#myTable').DataTable({--}}
{{--                pageLength: 8,--}}
{{--                ajax : '{{route('doctor.getDoctorsJson')}}',--}}
{{--                columns: [--}}
{{--                    { data: function (data, type, row, meta) {--}}
{{--                            return meta.row + meta.settings._iDisplayStart + 1;--}}
{{--                        },name: "sn", searchable: false ,orderable:false},--}}
{{--                    {data:"name", name:"name"},--}}
{{--                    {data: "type", name: "type"},--}}
{{--                    {data: "start_date", name: "start_date"},--}}
{{--                    {data: "end_date", name: "end_date"},--}}
{{--                    {data: "details", name: "details"},--}}
{{--                    {data: "quantity", name: "quantity"},--}}
{{--                    {data: "quantity", name: "quantity"},--}}
{{--                    {data: "quantity", name: "quantity"},--}}


{{--                    --}}{{--{ data: function(data,b,c,table) {--}}
{{--                    --}}{{--        var buttons = '';--}}
{{--                    --}}{{--        buttons += "<a class='btn btn-sm btn-primary'  href='{{route('doctor.edit',array('id'=>false))}}"+"/"+data.id+"' type='button' title='Edit'><i class='fa fa-edit'></i></a>&nbsp";--}}
{{--                    --}}{{--        buttons += "<a class='btn btn-sm btn-primary'  href='{{route('doctor.show',array('id'=>false))}}"+"/"+data.id+"' type='button' title='Show'> Issue</a>&nbsp";--}}
{{--                    --}}{{--        buttons += "<a type='button'  data-id='"+data.id+"' class='btn btn-sm btn-danger del' title='Delete' ><i class='fa fa-trash'></i></a>";--}}
{{--                    --}}{{--        return buttons;--}}
{{--                    --}}{{--    }, name:'action',searchable: false,orderable: false},--}}
{{--                ]--}}
{{--            });--}}
{{--        } );--}}

{{--        --}}{{--$(document).on('click','.del',function (){--}}
{{--        --}}{{--    var id = $(this).data('id');--}}
{{--        --}}{{--    alertify.confirm('Delete?', 'Are You Sure you want to delete this record?', function(){	$.get("{{route('doctor.delete',array('id'=>false))}}"+"/"+id,function (d) {--}}
{{--        --}}{{--            alertify.success("Record Deleted");--}}
{{--        --}}{{--            $('#myTable').DataTable().ajax.reload();--}}
{{--        --}}{{--        });}--}}
{{--        --}}{{--        , function(){ });--}}
{{--        --}}{{--});--}}

{{--        function edited () {--}}
{{--            alertify.success('Record edited');--}}
{{--        }--}}
{{--    </script>--}}


@endsection
