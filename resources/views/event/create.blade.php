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
                                        <h5>Add Events</h5>
                                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    </div>
                                    <div class="card-block">
                                        <form id="main" method="post" action="{{route('event.store')}}" >
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="name" id="name"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea type="text" class="form-control" name="description" id="description"  rows="7" placeholder="" required>
                                                    </textarea>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Location</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="location" id="location"  placeholder="" required>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Start Date</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="start_date" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">End date</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="date" name="end_date" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Start Time</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    {{--                                            <p>Add type<code>&lt;input type="date"&gt;</code></p>--}}
                                                    <input class="form-control" type="time" name="start_time" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">End Time</label>
                                                <div class="col-sm-12 col-xl-4">
                                                    <input class="form-control" type="time" name="end_time" required>
                                                </div>
                                            </div>
{{--                                                    <div class="form-group row">--}}
{{--                                                        <div class="col-sm-2">--}}
{{--                                                            <label class="form-label" for="">From</label>--}}
{{--                                                            <input class="form-control" type="time"  name="from"/>                                                            </div>--}}
{{--                                                        <div class="col-sm-2">--}}
{{--                                                            <label class="form-label" for="">To</label>--}}
{{--                                                            <input class="form-control" type="time" name="to"/>                                                            </div>--}}
{{--                                                    </div>--}}
                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                                    <a href="{{ route('event.index') }}" class="btn btn-danger">Back</a>

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

