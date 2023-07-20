@extends('layouts.app')
@section('content')
<div class="pcoded-content">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <form id="" method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div class="container">
                                        <div class="card shadow-lg">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label ml-4">Image</label>
                                                        <div class="col-sm-8">
                                                            <input type="file" class="form-control" name="ticket_type_image[]"  accept='image/*' id="image" onchange="imageUpload('image','imagePreview')" >
                                                            <span class="messages"></span>
                                                        </div>

                                                        <div class="col-sm-10">
                                                            <img   class="thumbnail" style="height: 150px;" id="imagePreview">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="fw-bold mb-2">Name:</h6>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" value="{{$user->name}}" name="name">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="fw-bold mb-2">Email:</h6>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="email" value="{{$user->email}}" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="fw-bold mb-2">Role:</h6>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <select class="form-select" id="roleselect" name="role" value="{{$user->role}}">
                                                                    <option value="staff">Staff</option>
                                                                    <option value="doctor">Doctor</option>
                                                                </select>
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
