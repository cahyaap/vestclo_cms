<div id="addSize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-size">
                <form id="add-size" method="POST" action="{{ route('createSize') }}">
                    {{ csrf_field() }}
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Size Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required="required" placeholder="Type size name here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-size">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-size">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editSize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-size">
                <form id="edit-size" method="POST" action="{{ route('updateSize') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="size-id" name="size_id">
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Size Name</label>
                                    <input type="text" id="edit_name" name="edit_name" class="form-control" required="required" placeholder="Type size name here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-size">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-size">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteSize" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Size Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-size">
                <h4>Are you sure to delete <span id="delete-size-name"></span> size data?</h4>
                <small style="color: red">All the type data will be deleted too</small>
            </div>
            <form id="delete-size" method="POST" action="{{ route('deleteSize') }}">
                {{ csrf_field() }}
                <input type="hidden" id="size-id-delete" name="size_id">
                <div class="modal-footer delete-size">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-size-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="addCategorySize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Category Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-category-size">
                <form id="add-category-size" method="POST" action="{{ route('createCategorySize') }}">
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
                                    <label class="label-control" for="name">Size</label>
                                    <select class="form-control" id="size" name="size" required>
                                        <option value="">-- Select size --</option>
                                        @foreach($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Length (P)</label>
                                    <input type="number" id="length" name="length" class="form-control" required="required" placeholder="Type length (p) shirt here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Width (L)</label>
                                    <input type="number" id="width" name="width" class="form-control" required="required" placeholder="Type width (l) shirt here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-size">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-category-size">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editCategorySize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category Size</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-category-size">
                <form id="edit-category-size" method="POST" action="{{ route('createCategorySize') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="category-size-id" name="category_size_id">
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                            <div class="form-group">
                                    <label class="label-control" for="name">Category</label>
                                    <select class="form-control" id="edit-category-name" name="category" required>
                                        <option value="">-- Select category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Size</label>
                                    <select class="form-control" id="edit-size-name" name="size" required>
                                        <option value="">-- Select size --</option>
                                        @foreach($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Length (P)</label>
                                    <input type="number" id="edit-length" name="length" class="form-control" required="required" placeholder="Type length (p) shirt here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Width (L)</label>
                                    <input type="number" id="edit-width" name="width" class="form-control" required="required" placeholder="Type width (l) shirt here...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-category-size">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-category-size">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCategorySize" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category Size Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-size">
                <h4>Are you sure to delete <span id="delete-category-size-name"></span> data?</h4>
                <small style="color: red">All the type data will be deleted too</small>
            </div>
            <form id="delete-category-size" method="POST" action="{{ route('deleteCategorySize') }}">
                {{ csrf_field() }}
                <input type="hidden" id="category-size-id-delete" name="category_size_id">
                <div class="modal-footer delete-size">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-category-size-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>