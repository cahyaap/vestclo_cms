@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shirt Management</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-primary" href="{{ route('category') }}">Category</a>
                        <a class="btn btn-primary" href="{{ route('type') }}">Type</a>
                        <a class="btn btn-primary" href="{{ route('size') }}">Size</a>
                        <a class="btn btn-primary" href="{{ route('color') }}">Color</a>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addShirt">New Shirt</a>
                    </div>
                    <div class="table-responsive">
                        <table id="stock-list-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Shirt</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Purchase Price</th>
                                    <th class="text-center">Selling Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach($shirts as $shirt)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $shirt['category']->name." ".$shirt['type']->name }}</td>
                                    <td class="text-center">{{ $shirt['size']['size']->name }}</td>
                                    <td class="text-center">
                                        {{ $shirt['color']->name }} 
                                        <div style="background-color: <?= $shirt['color']->colorpicker ?>; height: 20px; width: 30px; margin-left: 5px; display: inline-block; vertical-align: middle; border: solid lightgrey 1px;"></div>
                                    </td>
                                    <td class="text-right">{{ number_format($shirt->fund, 0) }}</td>
                                    <td class="text-right">{{ number_format($shirt->price, 0) }}</td>
                                    <td class="text-center">
                                        <a href="#" class="edit-shirt-button" data-toggle="modal" data-target="#editShirt" data-id="{{ $shirt->id }}" data-category="{{ $shirt->category_id }}" data-type="{{ $shirt->type_id }}" data-size-id="{{ $shirt->category_size_id }}" data-size="{{ $shirt['size']['size']->name }}" data-color-id="{{ $shirt->color_id }}" data-color="{{ $shirt['color']->name }}" data-price="{{ $shirt->price }}" data-fund="{{ $shirt->fund }}" data-description="{{ $shirt->description }}">Edit</a>

                                        @if(!in_array($shirt->id, $shirt_exist))
                                        <a href="#" class="delete-shirt-button" data-toggle="modal" data-target="#deleteShirt" data-id="{{ $shirt->id }}" data-category="{{ $shirt['category']->name }}" data-type="{{ $shirt['type']->name }}" data-size="{{ $shirt['size']['size']->name }}" data-color="{{ $shirt['color']->name }}">Delete</a>
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
@include('shirt.modal')
<script type="text/javascript">
    function getSizeColor(category_id, size_elem, color_elem) {
        if (category_id !== "") {
            $.ajax({
                url: "/shirt/getShirtSizeColor/" + category_id,
                success: function(res) {
                    $(size_elem).empty();
                    $(color_elem).empty();
                    var size = "<option value=''>-- Select size --</option>";
                    var color = "<option value=''>-- Select color --</option>";
                    $.each(res.sizes, function(key, value) {
                        size = size + "<option value='" + value.id + "'>" + value.size.name + "</option>";
                    });
                    $.each(res.colors, function(key, value) {
                        color = color + "<option value='" + value.id + "'>" + value.name + "</option>";
                    });
                    $(size_elem).append(size);
                    $(color_elem).append(color);
                }
            });
        } else {
            $(size_elem).empty();
            $(color_elem).empty();
            var size = "<option value=''>-- Select size --</option>";
            var color = "<option value=''>-- Select color --</option>";
            $(size_elem).append(size);
            $(color_elem).append(color);
        }
    }
    $(document).ready(function() {
        var table = $('#stock-list-table').DataTable();
        $(this).on('change', '#category', function() {
            getSizeColor($(this).val(), '#size', '#color');
        });

        $(this).on('change', '#edit-category', function() {
            getSizeColor($(this).val(), '#edit-size', '#edit-color');
        });

        $(this).on('click', '.edit-shirt-button', function() {
            $('#shirt-id').val($(this).attr('data-id'));
            $('#edit-category').val($(this).attr('data-category'));
            $('#edit-type').val($(this).attr('data-type'));
            $('#edit-fund').val($(this).attr('data-fund'));
            $('#edit-price').val($(this).attr('data-price'));
            $('#edit-description').val($(this).attr('data-description'));
            $('#edit-size').empty();
            $('#edit-color').empty();
            $('#edit-size').append("<option value='" + $(this).attr('data-size-id') + "'>" + $(this).attr('data-size') + "</option>");
            $('#edit-color').append("<option value='" + $(this).attr('data-color-id') + "'>" + $(this).attr('data-color') + "</option>");
        });

        $(this).on('click', '.delete-shirt-button', function() {
            $('#shirt-id-delete').val($(this).attr('data-id'));
            var shirt = $(this).attr('data-category')+"-"+$(this).attr('data-type')+"-"+$(this).attr('data-size')+"-"+$(this).attr('data-color');
            $('#delete-shirt-name').html(shirt);
        });
    });
</script>
@endsection