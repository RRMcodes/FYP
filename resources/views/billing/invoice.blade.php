<html>

<head>

    <style>



        td {
            padding: 12px 40px;
        }

    </style>
</head>

<body>

    <div class="pcoded-content">

        <h2>Invoice</h2>


        <div style="padding: 30px 30px 30px 0">

            <div width="500px">
                <h4 style="display: inline">Date: {{date('Y-m-d')}}</h4>

                <h4 style="display: inline; position: absolute; right: 0 "> Reffered By: Dr. {{$doctor->f_name.' '.$doctor->l_name}}</h4>
                <h4 style="display: inline; position: absolute; right: 0;top: 5px"> Invoice ID: {{$billing->id}}</h4>
            </div>

            <h4>Patient Name:  {{$patient->f_name.' '.$patient->l_name}}</h4>

            <h4>Contact Number: {{$patient->contact_number}} </h4>

            <h4>Email: {{$patient->email}}</h4>

            <h4>Address: {{$patient->address}}</h4>
        </div>

{{--        <div class="card-block table-border-style">--}}
{{--            <div class="table-responsive">--}}
                <table style=" ">
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
                    @foreach($itemLogs as $key => $itemLog)
                        @php
                            $item = $items->where('id', $itemLog->item_id)->first();
                            $subTotal = $itemLog->quantity * $item->price;
                        @endphp
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $itemLog->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $subTotal }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--            </div>--}}

                <br>

                <h4>Total (Rs): {{$total}}</h4>

                <h4>Vat 13% (Rs): {{$vat}}</h4>

                <h4>Grand Total (Rs): {{ $grand_total }}</h4>
{{--        </div>--}}
    </div>

</body>
</html>
