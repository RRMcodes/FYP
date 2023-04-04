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
                                        <h5>Add Clinical Test</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('service.store')}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Abbreviation</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="abbreviation" name="abbreviation"  placeholder="" >
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="price" name="price"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('service.index') }}" class="btn btn-danger">Back</a>

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

