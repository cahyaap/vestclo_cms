@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Stock - Transaction History</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-default border" href="{{ route('stock') }}">Back</a>
                    </div>
                    <div class="table-responsive">
                        <table id="transaction-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Shirt</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($transactions as $transaction)
                                <?php
                                $name = $transaction['shirt']['category']->name . " " . $transaction['shirt']['type']->name . " - " . $transaction['shirt']['color']->name . " (" . $transaction['shirt']['size']['size']->name . ")";
                                ?>
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-left">{{ $transaction->name }}</td>
                                    <td class="text-left">{{ $transaction->mobile }}</td>
                                    <td class="text-left">{{ $name }}</td>
                                    <td class="text-center">{{ number_format($transaction->quantity, 0) }}</td>
                                    <td class="text-center">{{ $transaction['status']->name }}</td>
                                    <td class="text-center">{{ explode(' ', $transaction->created_at)[0] }}</td>
                                    <td class="text-center">
                                        <a href="#" class="edit-transaction-button" data-toggle="modal" data-id="{{ $transaction->id }}" data-name="{{ $transaction->name }}" data-mobile="{{ $transaction->mobile }}" data-shirt="{{ $transaction->shirt_id }}" data-quantity="{{ $transaction->quantity }}" data-status="{{ $transaction->status_transaction_id }}" data-target="#editTransaction">Edit</a>
                                        <a href="#" class="delete-transaction-button" data-toggle="modal" data-id="{{ $transaction->id }}" data-shirt="{{ $name.' - '.$transaction['status']->name }}" data-target="#deleteTransaction">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('transaction.modal')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#transaction-table').DataTable();
        $(this).on('click', '.edit-transaction-button', function() {
            $('#transaction-id').val($(this).attr('data-id'));
            $('#edit-name').val($(this).attr('data-name'));
            $('#edit-mobile').val($(this).attr('data-mobile'));
            $('#edit-shirt').val($(this).attr('data-shirt'));
            $('#edit-quantity').val($(this).attr('data-quantity'));
            $('#edit-transaction-type').val($(this).attr('data-status'));

            $('#edit-shirt').val($(this).attr('data-shirt'));
            $('.selectpicker').selectpicker('refresh');
        });
        $(this).on('click', '.delete-transaction-button', function() {
            $('#transaction-id-delete').val($(this).attr('data-id'));
            $('#delete-transaction-name').html($(this).attr('data-shirt'));
        });
    });
</script>
@endsection