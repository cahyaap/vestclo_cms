<div id="editTransaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-transaction">
                <form id="edit-transaction" method="POST" action="{{ route('updateTransaction') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="transaction-id" name="transaction_id">
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Transaction Type</label>
                                    <select class="form-control" id="edit-transaction-type" name="transaction_type" required>
                                        <option value="">-- Select transaction type --</option>
                                        @foreach($status_transactions as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Name</label>
                                    <input type="text" id="edit-name" name="name" class="form-control" required="required" placeholder="Type buyer name here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Phone Number</label>
                                    <input type="number" id="edit-mobile" name="mobile" class="form-control" placeholder="Type buyer phone number here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Shirt</label>
                                    <select class="form-control selectpicker" data-live-search="true" id="edit-shirt" name="shirt" required>
                                        <option value="">-- Select shirt --</option>
                                        @foreach($shirts as $shirt)
                                        <option value="{{ $shirt->id }}">{{ $shirt['category']->name." ".$shirt['type']->name." - ".$shirt['color']->name." (".$shirt['size']['size']->name.")" }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Quantity</label>
                                    <input type="number" id="edit-quantity" name="quantity" class="form-control" required="required" placeholder="Type quantity shirt here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-transaction">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-transaction">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteTransaction" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Transaction Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-transaction">
                <h4>Are you sure to delete <span id="delete-transaction-name"></span> transaction data?</h4>
                <small style="color: red">All the type data will be deleted too</small>
            </div>
            <form id="delete-type" method="POST" action="{{ route('deleteTransaction') }}">
                {{ csrf_field() }}
                <input type="hidden" id="transaction-id-delete" name="transaction_id">
                <div class="modal-footer delete-transaction">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-transaction-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>