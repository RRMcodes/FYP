@extends('layouts.app')
@section('content')
    <div class="pcoded-content">

        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row">

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card prod-p-card card-red">
                                            <div class="card-body">
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h3 class="m-b-5 text-white">Patients</h3>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa fa-user-plus fa-lg text-c-red"></i>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h6 class="m-b-5 text-white">Total</h6>
                                                        <h3 class="m-b-0 f-w-700 text-white"> {{count( $patients)}}
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <div class="card prod-p-card card-blue">
                                            <div class="card-body">
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h3 class="m-b-5 text-white"> Doctors</h3>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fas fa-user-md fa-lg text-c-blue"></i>                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h6 class="m-b-5 text-white">Total</h6>
                                                        <h3 class="m-b-0 f-w-700 text-white"> {{count( $doctors)}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card prod-p-card card-green">
                                            <div class="card-body">
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h3 class="m-b-5 text-white">Staffs</h3>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i class="fa-solid fa-user fa-lg text-c-green"></i>                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h6 class="m-b-5 text-white">Total</h6>
                                                        <h3 class="m-b-0 f-w-700 text-white"> {{count($staffs)}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card prod-p-card card-yellow">
                                            <div class="card-body">
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h3 class="m-b-5 text-white" style="margin-left: -10px">Appointments</h3>
                                                    </div>
                                                    <div class="col-auto " style="margin-left: -35px">
                                                        <i class="fa-regular fa-calendar-days fa-lg text-c-yellow "></i>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center m-b-30">
                                                    <div class="col">
                                                        <h6 class="m-b-5 text-white">Today</h6>
                                                        <h3 class="m-b-0 f-w-700 text-white">{{count($appointments->filter(function ($appointment) {
                                                                                                return date_format(date_create(($appointment->appointment_date)), 'Y-m-d') == now()->format('Y-m-d');
                                                                                                    }))}}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="card">
                                        <div class="card-header">
                                            <h5> Item Billings Chart</h5>
                                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                        </div>
                                        <div class="card-block">
                                            <canvas id="myChart" width="480px"></canvas>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-12">
                                        <div class="card new-cust-card">
                                            <div class="card-header">
                                                <h5>Low Stock Items</h5>
                                            </div>
                                            <div class="card-block" style="">

                                                @foreach($items->where('quantity','<',1000 ) as $item)
                                                    <div class="align-middle m-b-35">
                                                        <div class="d-inline-block">
                                                            <h6>{{$item->name}}</h6>
                                                        </div>
                                                        <div class="d-inline-block ml-4 text-red">
                                                            <h4 class="text-c-red" >{{$item->quantity}} units left</h4>
                                                        </div>
                                                    </div>
                                                @endforeach
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        var billings = {!! json_encode($billings) !!};

        var item_billing = billings.filter(function (billing) {
            return billing.transaction === 'item';
        });

        var test_billing = billings.filter(function (billing) {
            return billing.transaction === 'test';
        });

        var dates = item_billing.map(function (billing) {
            return billing.created_at.substr(0, 10);
        }).filter(function (value, index, self) {
            return self.indexOf(value) === index;
        });

        var date_counts = dates.reduce(function (counts, date) {
            counts[date] = item_billing.filter(function (billing) {
                return billing.created_at.substr(0, 10) === date;
            }).length;
            return counts;
        }, {});
        var counts = Object.values(date_counts);
        console.log(item_billing, dates, counts);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Item Billing Count',
                    data: counts,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

