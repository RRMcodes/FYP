<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pdf-card-header">
                                    <h5>Invoice</h5>
                                </div>
                                <div class="card-block table-border-style">
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
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach($itemLogs as $key => $itemLog)
                                                @php
                                                    $item = $items->where('id', $itemLog->item_id)->first();
                                                    $subTotal = $itemLog->quantity * $item->price;
                                                    $total += $subTotal;
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
                                    </div>

                                    <div class="col-sm-12 text-right">
                                        <label for="sub_total">
                                            <h6>Total (Rs): </h6>
                                        </label>
                                        <input type="number" class="total" name="total" value="{{ number_format($total, 2) }}" readonly>
                                    </div>

                                    <div class="col-sm-12 text-right">
                                        <label for="tax">
                                            <h6>Vat 13% (Rs): </h6>
                                        </label>
                                        @php
                                            $tax = $total * 13 / 100;
                                        @endphp
                                        <input type="number" class="tax" name="tax" value="{{ number_format($tax, 2) }}" readonly>
                                    </div>

                                    <div class="col-sm-12 text-right">
                                        <label for="grand_total">
                                            <h6>Grand Total (Rs): </h6>
                                        </label>
                                        <input type="number" class="grand_total" name="grand_total" value="{{ number_format($total + $tax, 2) }}" readonly>
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
