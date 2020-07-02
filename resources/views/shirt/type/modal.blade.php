<div id="addType" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-type">
                <form id="add-type" method="POST" action="{{ route('createType') }}">
                    {{ csrf_field() }}
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Type Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required="required" placeholder="Type type name here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-type">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-type">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editType" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-demand">
                <form id="edit-type" method="POST" action="{{ route('updateType') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="type-id" name="type_id">
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Type Name</label>
                                    <input type="text" id="edit_name" name="edit_name" class="form-control" required="required" placeholder="Type type name here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-type">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-type">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteType" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Type Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-type">
                <h4>Are you sure to delete <span id="delete-type-name"></span> type data?</h4>
                <small style="color: red">All the type data will be deleted too</small>
            </div>
            <form id="delete-type" method="POST" action="{{ route('deleteType') }}">
                {{ csrf_field() }}
                <input type="hidden" id="type-id-delete" name="type_id">
                <div class="modal-footer delete-type">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-type-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>