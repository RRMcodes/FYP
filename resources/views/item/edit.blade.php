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
                                        <h5>Edit Item record</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('item.update',["id"=>$item->id] )}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" value="{{$item->name}}" placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Manufacturer</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{$item->manufacturer}}" placeholder="" >
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Manufactured Date</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="manufactured_date" value="{{$item->manufactured_date}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Expiry_date</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="expiry_date" value="{{$item->expiry_date}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Quantity</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="quantity" name="quantity"  placeholder=""  value="{{$item->quantity}}" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="price" name="price"  placeholder="" value="{{$item->price}}" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>

                                                </div>
                                            </div>
                                        </form>
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
