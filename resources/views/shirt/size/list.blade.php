@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Shirt - Size</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-default border" href="{{ route('shirt') }}">Back</a>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addSize">New Size</a>
                    </div>
                    <div class="table-responsive">
                        <table id="size-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($sizes as $size)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $size->name }}</td>
                                    <td class="text-center">
                                        <a href="#" class="edit-size-button" data-toggle="modal" data-id="{{ $size->id }}" data-size="{{ $size->name }}" data-target="#editSize">Edit</a>
                                        @if(!in_array($size->id, $size_exist))
                                        <a href="#" class="delete-size-button" data-toggle="modal" data-id="{{ $size->id }}" data-size="{{ $size->name }}" data-target="#deleteSize">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shirt - Category Size</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-default border" href="{{ route('shirt') }}">Back</a>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addCategorySize">New Category Size</a>
                    </div>
                    <div class="table-responsive">
                        <table id="category-size-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">P x L</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($category_sizes as $category_size)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $category_size['category']->name }}</td>
                                    <td class="text-center">{{ $category_size['size']->name }}</td>
                                    <td class="text-center">{{ $category_size->p." x ".$category_size->l." cm" }}</td>
                                    <td class="text-center">
                                        <a href="#" class="edit-size-category-button" data-toggle="modal" data-id="{{ $category_size->id }}" data-size="{{ $category_size->size_id }}" data-category="{{ $category_size->category_id }}" data-length="{{ $category_size->p }}" data-width="{{ $category_size->l }}" data-target="#editCategorySize">Edit</a>
                                        @if(!in_array($category_size->id, $category_size_exist))
                                        <a href="#" class="delete-category-size-button" data-toggle="modal" data-id="{{ $category_size->id }}" data-size="{{ $category_size['size']->name }}" data-category="{{ $category_size['category']->name }}" data-target="#deleteCategorySize">Delete</a>
                                        @endif
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
@include('shirt.size.modal')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#size-table').DataTable();
        var table = $('#category-size-table').DataTable();
        $(this).on('click', '.edit-size-button', function() {
            $('#size-id').val($(this).attr('data-id'));
            $('#edit_name').val($(this).attr('data-size'));
        });
        $(this).on('click', '.delete-size-button', function() {
            $('#size-id-delete').val($(this).attr('data-id'));
            $('#delete-size-name').html($(this).attr('data-size'));
        });
        $(this).on('click', '.edit-size-category-button', function() {
            $('#category-size-id').val($(this).attr('data-id'));
            $('#edit-size-name').val($(this).attr('data-size'));
            $('#edit-category-name').val($(this).attr('data-category'));
            $('#edit-length').val($(this).attr('data-length'));
            $('#edit-width').val($(this).attr('data-width'));
        });
        $(this).on('click', '.delete-category-size-button', function() {
            $('#category-size-id-delete').val($(this).attr('data-id'));
            var categorySize = $(this).attr('data-category')+" "+$(this).attr('data-size')+" ";
            $('#delete-category-size-name').html(categorySize);
        });
    });
</script>
@endsection