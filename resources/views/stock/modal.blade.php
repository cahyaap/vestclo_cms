<div id="addTransaction" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-transaction">
                <form id="add-transaction" method="POST" action="{{ route('createTransaction') }}">
                    {{ csrf_field() }}
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Transaction Type</label>
                                    <select class="form-control" id="transaction_type" name="transaction_type" required>
                                        <option value="">-- Select transaction type --</option>
                                        @foreach($status_transactions as $s)
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required="required" placeholder="Type buyer name here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Phone Number</label>
                                    <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Type buyer phone number here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Shirt</label>
                                    <select class="form-control selectpicker" data-live-search="true" id="shirt" name="shirt" required>
                                        <option value="">-- Select shirt --</option>
                                        @foreach($shirts as $shirt)
                                        <option value="{{ $shirt->id }}">{{ $shirt['category']->name." ".$shirt['type']->name." -- ".$shirt['color']->name." (".$shirt['size']['size']->name.")" }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" required="required" placeholder="Type quantity shirt here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-transaction">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-transaction">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>