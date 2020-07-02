<div id="addCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-category">
                <form id="add-category" method="POST" action="{{ route('createCategory') }}">
                    {{ csrf_field() }}
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Category Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required="required" placeholder="Type category name here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Description</label>
                                    <textarea rows="4" id="description" name="description" class="form-control" required="required" placeholder="Type category description here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-category">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-category">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-demand">
                <form id="edit-category" method="POST" action="{{ route('updateCategory') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="category-id" name="category_id">
                    <div id="item_container">
                        <div class="row item" id="item_1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Category Name</label>
                                    <input type="text" id="edit_name" name="edit_name" class="form-control" required="required" placeholder="Type category name here...">
                                </div>
                                <div class="form-group">
                                    <label class="label-control" for="name">Description</label>
                                    <textarea rows="4" id="edit_description" name="edit_description" class="form-control" required="required" placeholder="Type category description here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-category">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-category">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-category">
                <h4>Are you sure to delete <span id="delete-category-name"></span> category data?</h4>
                <small style="color: red">All the category data will be deleted too</small>
            </div>
            <form id="delete-category" method="POST" action="{{ route('deleteCategory') }}">
                {{ csrf_field() }}
                <input type="hidden" id="category-id-delete" name="category_id">
                <div class="modal-footer delete-category">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-category-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>