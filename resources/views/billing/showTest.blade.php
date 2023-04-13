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
                                        <h5>Invoice</h5>
                                        {{--                                        <div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>--}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <form action="" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group row pl-4">

                                                <div class="form-group col-sm-auto text-right">

                                                    <div class="form-group inline text-center">
                                                        <label class="" for="patient_name" ><h6>Patient Name :</h6></label>
                                                        <input type="text" value="{{$patient->f_name.' '.$patient->l_name}}" name="contact_number" id="contact_number" disabled>
                                                    </div>

                                                    <div class="form-group inline-group">
                                                        <label for="dob">Date of birth :</label>
                                                        <input type="text" value="{{$patient->dob}}" name="dob" id="dob" disabled>
                                                    </div>

                                                    <div class="form-group  inline-group">
                                                        <label for="contact_number">Contact Number :</label>
                                                        <input type="text" value="{{$patient->contact_number}}" name="contact_number" id="contact_number" disabled>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="address">Address :</label>
                                                        <input type="text" value="{{$patient->address}}" name="address" id="address" disabled>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="blood_group">Blood Group :</label>
                                                        <input type="text" value="{{$patient->blood_group}}" name="blood_group" id="blood_group" disabled>
                                                    </div>

                                                </div>

                                                <div class="form-group col-sm-7 text-right">
                                                    <div class="form-group col-sm-auto ">
                                                        <label for="date" ><h6>Date :</h6></label>
                                                        <input class="col-sm-4" type="date" name="date" value="{{$billing->date}}" disabled>
                                                    </div>

                                                    <div class="form-group col-sm-auto ">
                                                        <label for="doctor_name" ><h6>Referred By :</h6></label>
                                                        <input type="text" value="{{$doctor->f_name.' '.$doctor->l_name}}" name="contact_number" id="contact_number" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table" id="itemTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Sno.</th>
                                                        <th>Test</th>
                                                        <th>Abbreviation</th>
                                                        <th>Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($serviceLogs as $key=>$serviceLog)
                                                        <tr>
                                                            <th scope="row">{{$key+1}}</th>
                                                            <td><input type="text" value="{{$services->where('id', $serviceLog->service_id)->first()->name}}" data-id="{{$serviceLog->service_id}}" class="itemName" name="item_name" disabled></td>
                                                            <td><input type="text" value="{{$services->where('id', $serviceLog->service_id)->first()->abbreviation}}" class="quantity" name="quantity[]"   disabled></td>
                                                            <td><input type="number" value="{{$services->where('id', $serviceLog->service_id)->first()->price}}" class="price" name="price[]" disabled></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class=" col-sm-12 text-right">
                                                <label for="sub_total"> <h6>Total (Rs): </h6> </label>
                                                <input type="number" class="total" name="total" value="" id="total" disabled>
                                            </div>

                                            <div class=" col-sm-12 text-right">
                                                <label for="tax"> <h6>Vat 13% (Rs): </h6> </label>
                                                <input type="number" class="tax" name="tax" value="" id="tax" disabled>
                                            </div>

                                            <div class=" col-sm-12 text-right">
                                                <label for="grand_total"> <h6>Grand Total (Rs): </h6> </label>
                                                <input type="number" class="grand_total" name="grand_total" value="" id="grand_total" disabled>
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









    <script>

        const tableRows = document.querySelectorAll("#itemTable tbody tr");



        var total = 0;
        $('.price').each(function() {
            total += parseInt($(this).val()) || 0;
        });

        $('#total').val(total);

        var tax = total * 13 /100;
        $('#tax').val(tax);

        $('#grand_total').val(total + tax);



    </script>
@endsection

