@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Stock List</div>

                <div class="card-body table-responsive">
                    <table id="stock-list-table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Shirt</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            $i = 1; ?>
                            @foreach($shirts as $shirt)
                            <?php
                            $key = $shirt['category']->id."-".$shirt['type']->id."-".$shirt['size']['size']->id."-".$shirt['color']->id;
                            if (array_key_exists($key, $stock_exist)) {
                                $stockIn = (empty($stock_exist[$key][1])) ? 0 : $stock_exist[$key][1];
                                $stockOut = (empty($stock_exist[$key][2])) ? 0 : $stock_exist[$key][2];
                                $stock = $stockIn - $stockOut;
                                $total = $total + $stock;
                            } else {
                                $stock = 0;
                            }
                            ?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center <?php if ($stock === 0) {
                                                            echo "out-of-stock";
                                                        } ?>">{{ number_format($stock, 0) }}</td>
                                <td class="text-center">{{ $shirt['category']->name." ".$shirt['type']->name }}</td>
                                <td class="text-center">{{ $shirt['size']['size']->name }}</td>
                                <td class="text-center">
                                    {{ $shirt['color']->name }}
                                    <div style="background-color: <?= $shirt['color']->colorpicker ?>; height: 20px; width: 30px; margin-left: 5px; display: inline-block; vertical-align: middle; border: solid lightgrey 1px;"></div>
                                </td>
                                <td class="text-center">{{ number_format($shirt->price/1000, 0)."k" }}</td>
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