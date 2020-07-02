@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shirt - Category</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-default border" href="{{ route('shirt') }}">Back</a>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addCategory">New Category</a>
                    </div>
                    <div class="table-responsive">
                        <table id="category-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class="text-center">
                                        <a href="#" class="edit-category-button" data-toggle="modal" data-id="{{ $category->id }}" data-category="{{ $category->name }}" data-description="{{ $category->description }}" data-target="#editCategory">Edit</a> 
                                        @if(!in_array($category->id, $category_exist))
                                        <a href="#" class="delete-category-button" data-toggle="modal" data-id="{{ $category->id }}" data-category="{{ $category->name }}" data-target="#deleteCategory">Delete</a>
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
@include('shirt.category.modal')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#category-table').DataTable();
        $(this).on('click', '.edit-category-button', function(){
            $('#category-id').val($(this).attr('data-id'));
            $('#edit_name').val($(this).attr('data-category'));
            $('#edit_description').val($(this).attr('data-description'));
        });
        $(this).on('click', '.delete-category-button', function(){
            $('#category-id-delete').val($(this).attr('data-id'));
            $('#delete-category-name').html($(this).attr('data-category'));
        });
    });
</script>
@endsection