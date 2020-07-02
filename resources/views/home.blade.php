@extends('layouts.app')

@section('content')
<style type="text/css">
.top-seller {
    border-radius: 4px;
    border: 1px solid rgba(0,0,0,.125);
}
.top-seller-header {
    padding: .75rem 1.25rem;
    background-color: rgba(0,0,0,.03);
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom: 1px solid rgba(0,0,0,.125);
}
.top-seller-body {
    padding: .75rem 1.25rem;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-bottom: 20px;">
            <div class="card">
                <div class="card-header">Cash Flow</div>
                <div class="card-body">
                    <?php
                    $total = 0;
                    $soldout = 0;
                    foreach ($shirts as $shirt) {
                        $key = $shirt['category']->id . "-" . $shirt['type']->id . "-" . $shirt['size']['size']->id . "-" . $shirt['color']->id;
                        if (array_key_exists($key, $stock_exist)) {
                            $stockIn = (empty($stock_exist[$key][1])) ? 0 : $stock_exist[$key][1];
                            $stockOut = (empty($stock_exist[$key][2])) ? 0 : $stock_exist[$key][2];
                        } else {
                            $stockIn = 0;
                            $stockOut = 0;
                        }
                        $stock = $stockIn - $stockOut;
                        $total = $total + $stock;
                        $soldout = $soldout + $stockOut;
                    }
                    ?>
                    <table class="table">
                        <tr class="text-center">
                            <th>Total Stock</th>
                            <td>{{ number_format($total, 0)." pcs" }}</td>
                        </tr>
                        <tr class="text-center">
                            <th>Sold Out</th>
                            <td>{{ number_format($soldout, 0)." pcs" }}</td>
                        </tr>
                        <tr class="text-center">
                            <th>Spending</th>
                            <td>{{ number_format($cash_flow["spending"], 0) }}</td>
                        </tr>
                        <tr class="text-center">
                            <th>Income</th>
                            <td>{{ number_format($cash_flow["income"], 0) }}</td>
                        </tr>
                        <tr class="text-center">
                            <th>Profit</th>
                            <td>{{ number_format($cash_flow["income"]-$cash_flow["spending"], 0) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="padding-bottom: 20px;">
            <div class="card">
                <div class="card-header">Best Seller</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="top-seller">
                                <div class="top-seller-header">
                                    Category
                                </div>
                                <div class="top-seller-body">
                                    asd
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="top-seller">
                                <div class="top-seller-header">
                                    Size
                                </div>
                                <div class="top-seller-body">
                                    asd
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="top-seller">
                                <div class="top-seller-header">
                                    Color
                                </div>
                                <div class="top-seller-body">
                                    asd
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Stock List</div>
                <div class="card-body">
                    <table id="stock-list-table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Shirt</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Price</th>
                                <!-- <th class="text-center">Description</th> -->
                                <th class="text-center">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $i = 1; ?>
                            @foreach($shirts as $shirt)
                            <?php
                            $key = $shirt['category']->id . "-" . $shirt['type']->id . "-" . $shirt['size']['size']->id . "-" . $shirt['color']->id;
                            if (array_key_exists($key, $stock_exist)) {
                                $stockIn = (empty($stock_exist[$key][1])) ? 0 : $stock_exist[$key][1];
                                $stockOut = (empty($stock_exist[$key][2])) ? 0 : $stock_exist[$key][2];
                                $stock = $stockIn - $stockOut;
                                $total = $total + $stock;
                            } else {
                                $stock = 0;
                            }
                            ?>
                            <tr class="<?php if ($stock === 0) {
                                            echo "out-of-stock";
                                        } ?>">
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $shirt['category']->name." ".$shirt['type']->name }}</td>
                                <td class="text-center">{{ $shirt['size']['size']->name }}</td>
                                <td class="text-center">
                                    {{ $shirt['color']->name }}
                                    <div style="background-color: <?= $shirt['color']->colorpicker ?>; height: 20px; width: 30px; margin-left: 5px; display: inline-block; vertical-align: middle; border: solid lightgrey 1px;"></div>
                                </td>
                                <td class="text-center">{{ number_format($shirt->price, 0) }}</td>
                                <!-- <td class="text-left">{{ $shirt->description }}</td> -->
                                <td class="text-center">{{ number_format($stock, 0) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-center">Total</th>
                                <th class="text-center">{{ number_format($total, 0) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#stock-list-table').DataTable();
    });
</script>
@endsection