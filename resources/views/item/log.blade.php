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
                                        <h4>Item Log</h4>
                                        {{--                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>--}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="dt-responsive table-responsive">

                                            @if (count($itemLogs)===0)
                                                <h4 style="text-align: center;margin: 10%"> Sorry, No billing records to show</h4>

                                            @else
                                                <table class="table table-striped table-bordered nowrap" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Billing ID</td>
                                                        <td>Item Name</td>
                                                        <td>Quantity</td>
                                                        <td>status</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($itemLogs as $key=>$itemLog)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$itemLog->billing_id}}</td>
                                                            <td>{{$item->where('id', $itemLog->item_id)->first()->name}}</td>
                                                            <td>{{$itemLog->quantity}}</td>
                                                            <td>{{$itemLog->status}}</td>
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

@endsection

