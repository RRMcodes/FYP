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

                                        <form action="{{route('billing.itemStore')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group row pl-4">

                                                <div class="form-group col-sm-auto text-right">

                                                    <div class="form-group inline text-center">
                                                        <label class="" for="patient_name" ><h6>Patient Name :</h6></label>
                                                        <select class="col-sm-auto" name="patient_id" id="patient_name" required>
                                                            <option value="" disabled selected>--Select--</option>
                                                            @foreach ($patients as $patient)
                                                                <option value="{{$patient->id}}" data-dob="{{$patient->dob}}" data-contact_number="{{$patient->contact_number}}" data-address="{{$patient->address}}" data-blood_group="{{$patient->blood_group}}">{{ucwords($patient->f_name.' '.$patient->l_name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group inline-group">
                                                        <label for="dob">Date of birth :</label>
                                                        <input type="text" value="" name="dob" id="dob" disabled>
                                                    </div>

                                                    <div class="form-group  inline-group">
                                                        <label for="contact_number">Contact Number :</label>
                                                        <input type="text" value="" name="contact_number" id="contact_number" disabled>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="address">Address :</label>
                                                        <input type="text" value="" name="address" id="address" disabled>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="blood_group">Blood Group :</label>
                                                        <input type="text" value="" name="blood_group" id="blood_group" disabled>
                                                    </div>

                                                </div>

                                                <div class="form-group col-sm-7 text-right">
                                                    <div class="form-group col-sm-auto ">
                                                        <label for="date" ><h6>Date :</h6></label>
                                                        <input class="col-sm-4" type="date" name="date" value="{{ now()->format('Y-m-d') }}" readonly>
                                                    </div>

                                                    <div class="form-group col-sm-auto ">
                                                        <label for="doctor_name" ><h6>Referred By :</h6></label>
                                                        <select class="col-sm-auto text-center" name="doctor_id" id="doctor_name" required>
                                                            <option value="" disabled selected >--Select--</option>
                                                            @foreach ($doctors as $doctor)
                                                                <option value="{{$doctor->id}}" data-dob="{{$doctor->dob}}">{{ucwords('Dr. '.$doctor->f_name.' '.$doctor->l_name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table" id="itemTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Sno.</th>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <select class="form-control itemName" name="itemId[]" id="itemName_1" required>
                                                                <option value="" disabled selected>--Select--</option>
                                                                @foreach($items as $item)
                                                                    <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="number" class="quantity" name="quantity[]" id="quantity_1" value=""></td>
                                                        <td><input type="number" class="price" name="price[]" value="" id="price_1" disabled></td>
                                                        <td><input type="number" class="sub_total" name="sub_total[]" value="" id="sub_total_1" disabled></td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-primary" id="addItemBtn">Add Item</button>
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
                                                <input type="number" class="grand_total" name="grand_total" value="" id="grand_total" readonly>
                                            </div>

                                            <div class=" col-sm-12 text-right">
                                                <button type="submit" class="btn btn-primary">Generate</button>

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

        $(document).ready(function() {

            $('.itemName').select2();
            $('#patient_name').select2();
            $('#doctor_name').select2();

            getPrice(".itemName");
            patientDetails("#patient_name");

            var rowNum = 1;

            $("#addItemBtn").click(function() {
                rowNum++;

                var row = '<tr>' +
                    '<th scope="row">' + rowNum + '</th>' +
                    '<td>' +
                    '<select class="form-control itemName" name="itemId[]" id="itemName_' + rowNum + '">' +
                    '<option value="" disabled selected>--Select--</option>' +
                    '@foreach($items as $item)' +
                    '<option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->name}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</td>' +
                    '<td><input type="number" class="quantity" name="quantity[]" id="quantity_' + rowNum + '" value=""></td>' +
                    '<td><input type="number" class="price" name="price[]" value="" id="price_' + rowNum + '" disabled></td>' +
                    '<td><input type="number" class="sub_total" name="sub_total[]" value="" id="sub_total_' + rowNum + '" disabled></td>' +
                    '</tr>';

                $("#itemTable tbody").append(row);

                var lastId = '#' + $('#itemTable select:last').attr('id');

                getPrice(lastId);
                $(lastId).select2();

            });

            $(document).on("change", ".itemName", function() {
                getPrice(this);
            });

            $(document).on("input", ".quantity", function() {
                var rowId = $(this).attr("id").split("_")[1];
                calculateTotal(rowId);
            });

            $(document).on("change", "#patient_name", function() {
                patientDetails(this);
            });


            function patientDetails (id){
                var patientId = $(id).val();

                var dob = $(id).find('option:selected').data('dob');
                var contact_number = $(id).find('option:selected').data('contact_number');
                var address = $(id).find('option:selected').data('address');
                var blood_group = $(id).find('option:selected').data('blood_group');


                $('#dob').val(dob)
                $('#contact_number').val(contact_number)
                $('#address').val(address)
                $('#blood_group').val(blood_group)
            }

            function getPrice (classname) {
                var price = $(classname).find('option:selected').data('price');
                console.log(price);
                var itemId = $(classname).val();
                var rowId = $(classname).attr("id").split("_")[1];
                console.log(itemId, rowId);

                // var price = $(this).find('option:selected').data('price');
                // $(this).closest('tr').find('.price').val(price);
                $("#price_" + rowId).val(price);

                // $.get('/fyp/public/billing/getItem/' + itemId, function(item) {
                //     $("#price_" + rowId).val(price);
                    calculateTotal(rowId);
                // });
            }

            function calculateTotal(rowId) {
                var quantity = $("#quantity_" + rowId).val();
                var price = $("#price_" + rowId).val();


                var sub_total = quantity * price;
                $("#sub_total_" + rowId).val(sub_total);

                var total = 0;
                $('.sub_total').each(function() {
                    total += parseInt($(this).val()) || 0;
                });
                $('#total').val(total);

                var tax = total * 13 /100;
                $('#tax').val(tax);

                $('#grand_total').val(total + tax);


            }


            // // Attach change event to quantity input field
            // $('.quantity').change(function() {
            //     // Get current row
            //     var row = $(this).closest('tr');
            //
            //     // Get current quantity and price values
            //     var quantity = $(this).val();
            //     var price = row.find('input[name="price"]').val();
            //
            //     // Calculate sub_total
            //     var sub_total = quantity * price;
            //
            //     // Update sub_total input field
            //     row.find('input[name="sub_total"]').val(sub_total);
            // });


        });

    </script>
@endsection

