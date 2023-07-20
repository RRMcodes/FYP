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
                                        <h4>Transaction Log</h4>
{{--                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>--}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="dt-responsive table-responsive">

                                            @if (count($billings)===0)
                                                <h4 style="text-align: center;margin: 10%"> Sorry, No billing records to show</h4>

                                            @else
                                                <table class="table table-striped table-bordered nowrap" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Patient</td>
                                                        <td>Referred by</td>
                                                        <td>date</td>
                                                        <td>Transaction Amount</td>
                                                        <td>Transaction </td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($billings as $key=>$billing)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$patients->where('id', $billing->patient_id)->first()->f_name.' '.$patients->where('id', $billing->patient_id)->first()->l_name}}</td>
                                                            <td>{{'Dr. '.$doctors->where('id', $billing->doctor_id)->first()->f_name.' '.$doctors->where('id', $billing->doctor_id)->first()->l_name}}</td>
                                                            <td>{{$billing->date}}</td>
                                                            <td>{{$billing->transaction_amount}}</td>
                                                            <td>{{$billing->transaction}}</td>
                                                            <td>
                                                                <a href="{{route('billing.itemShow',['id'=>$billing->id])}}" class="btn btn-primary"><i class="fa-solid fa-info"></i></a>

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

