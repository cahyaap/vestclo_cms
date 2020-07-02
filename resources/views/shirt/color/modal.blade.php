<div id="addColor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Color</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-color">
                <form id="add-color" method="POST" action="{{ route('createColor') }}">
                    {{ csrf_field() }}
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="">-- Select category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Color Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required="required" placeholder="Type color name here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Color Picker</label>
                                    <input type="color" id="colorpicker" name="colorpicker" class="form-control" required="required" placeholder="Choose color here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-color">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-color">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editColor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Color</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-demand">
                <form id="edit-color" method="POST" action="{{ route('updateColor') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="color-id" name="color_id">
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Category</label>
                                    <select class="form-control" id="edit_category" name="edit_category" required>
                                        <option value="">-- Select category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Color Name</label>
                                    <input type="text" id="edit_name" name="edit_name" class="form-control" required="required" placeholder="Type color name here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Color Picker</label>
                                    <input type="color" id="edit_colorpicker" name="edit_colorpicker" class="form-control" required="required" placeholder="Choose color here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-color">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-color">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteColor" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Color Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-color">
                <h4>Are you sure to delete <span id="delete-color-name"></span> color data?</h4>
                <small style="color: red">All the color data will be deleted too</small>
            </div>
            <form id="delete-color" method="POST" action="{{ route('deleteColor') }}">
                {{ csrf_field() }}
                <input type="hidden" id="color-id-delete" name="color_id">
                <div class="modal-footer delete-color">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-color-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>