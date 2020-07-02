<div id="addShirt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Shirt</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body add-shirt">
                <form id="add-shirt" method="POST" action="{{ route('createShirt') }}">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="type">Type</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="">-- Select type --</option>
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Size</label>
                                    <select class="form-control" id="size" name="size" required>
                                        <option value="">-- Select size --</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="color">Color</label>
                                    <select class="form-control" id="color" name="color" required>
                                        <option value="">-- Select color --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="price">Purchase Price</label>
                                    <input type="number" id="fund" name="fund" class="form-control" required="required" placeholder="Type shirt purchase price here...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="price">Selling Price</label>
                                    <input type="number" id="price" name="price" class="form-control" required="required" placeholder="Type shirt selling price here...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="price">Description</label>
                                    <textarea id="description" rows="4" name="description" class="form-control" placeholder="Type shirt description here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer add-shirt">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-shirt">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editShirt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Shirt</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body edit-shirt">
                <form id="edit-shirt" method="POST" action="{{ route('createShirt') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="shirt-id" name="shirt_id">
                    <div id="item_container">
                        <div class="row item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Category</label>
                                    <select class="form-control" id="edit-category" name="category" required>
                                        <option value="">-- Select category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="type">Type</label>
                                    <select class="form-control" id="edit-type" name="type" required>
                                        <option value="">-- Select type --</option>
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="name">Size</label>
                                    <select class="form-control" id="edit-size" name="size" required>
                                        <option value="">-- Select size --</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="color">Color</label>
                                    <select class="form-control" id="edit-color" name="color" required>
                                        <option value="">-- Select color --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="price">Purchase Price</label>
                                    <input type="number" id="edit-fund" name="fund" class="form-control" required="required" placeholder="Type shirt purchase price here...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="price">Selling Price</label>
                                    <input type="number" id="edit-price" name="price" class="form-control" required="required" placeholder="Type shirt price here...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control" for="price">Description</label>
                                    <textarea id="edit-description" rows="4" name="description" class="form-control" placeholder="Type shirt description here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-right: 0;padding-left: 0;" class="modal-footer edit-shirt">
                        <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit" class="btn btn-success waves-effect waves-light submit-edit-shirt">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteShirt" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Shirt Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body delete-size">
                <h4>Are you sure to delete <span id="delete-shirt-name"></span> data?</h4>
                <small style="color: red">All the type data will be deleted too</small>
            </div>
            <form id="delete-shirt" method="POST" action="{{ route('deleteShirt') }}">
                {{ csrf_field() }}
                <input type="hidden" id="shirt-id-delete" name="shirt_id">
                <div class="modal-footer delete-shirt">
                    <button type="button" class="btn btn-default border waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger waves-effect waves-light" id="delete-shirt-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>