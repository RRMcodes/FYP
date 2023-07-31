@extends('layouts.app')
@section('content')
<div class="pcoded-content">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <form id="" method="post"  action="{{route('password.update')}}" >
                                @csrf
                                @method('put')

                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div class="container">
                                        <div class="card shadow-lg">
                                            <div class="row align-items-center">

                                                <div class="col-md-4">
                                                    <div class="card-body">

                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">


                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="fw-bold mb-2">Current Password</h6>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="password" value="" name="current_password">
                                                            </div>
                                                        </div>


                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="fw-bold mb-2">New Password</h6>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="password" value="" name="password">
                                                            </div>
                                                        </div>


                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="fw-bold mb-4">Confirm Password</h6>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="password" value="" name="password_confirmation">
                                                            </div>
                                                        </div>


                                                        <div class="row mt-3">
                                                            <div class="col-sm-9 ms-2 text-right">
                                                                <button class="btn btn-primary me-2" type="submit">Update</button>
                                                                <a class="btn btn-danger"  href="{{ url()->previous() }}" id="backButton"
                                                                        type="button">Cancel</a>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

<script>
    function imageUpload(image,preview){

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(image).files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(preview).src = oFREvent.target.result;
        };

    }
</script>
@endsection
