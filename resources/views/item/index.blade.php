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
                                                <h5>Inventory Item List</h5>
                                                <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                            </div>

                                            <div class="card-header">
                                            <a href="{{route('item.create')}}" class="btn btn-primary" action="">Add Items</a>
                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">

                                                @if (count($items)===0)
                                                    <h4 style="text-align: center;margin: 10%"> Sorry, No items records to show</h4>

                                                @else
                                                <table class="table table-striped table-bordered nowrap" id="myTable">
                                                    <thead>
                                                    <tr>
                                                        <td>Sno</td>
                                                        <td>Name</td>
                                                        <td>Manufacturer</td>
                                                        <td>Manufactured_date</td>
                                                        <td>Expiry_date</td>
                                                        <td>Quantity</td>
                                                        <td>Price</td>
                                                        <td>Actions</td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($items as $key=>$item)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->manufacturer}}</td>
                                                            <td>{{$item->manufactured_date}}</td>
                                                            <td>{{$item->expiry_date}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>{{$item->price}}</td>

                                                            <td>
                                                                <a href="{{route('item.show',['id'=>$item->id])}}" class="btn btn-primary"><i class="fa fa-file"></i></a>
                                                                <a href="{{route('item.edit',['id'=>$item->id])}}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                                                <a href="{{route('item.delete',['id'=>$item->id])}}" class="btn btn-danger"><i class="fa fa-trash " aria-hidden="true"></i></a>
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
