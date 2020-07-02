@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shirt - Color</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-default border" href="{{ route('shirt') }}">Back</a>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addColor">New Color</a>
                    </div>
                    <div class="table-responsive">
                        <table id="color-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Color Name</th>
                                    <th class="text-center">Color Picker</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($colors as $color)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $color['category']->name }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td class="text-center">{{ $color->colorpicker }}
                                        <div style="background-color: <?= $color->colorpicker ?>; height: 20px; width: 30px; margin-left: 5px; display: inline-block; vertical-align: middle; border: solid lightgrey 1px;"></div></td>
                                    <td class="text-center">
                                        <a href="#" class="edit-color-button" data-toggle="modal" data-id="{{ $color->id }}" data-colorpicker="{{ $color->colorpicker }}" data-color="{{ $color->name }}" data-category="{{ $color->category_id }}" data-target="#editColor">Edit</a> 
                                        @if(!in_array($color->id, $color_exist))
                                        <a href="#" class="delete-color-button" data-toggle="modal" data-id="{{ $color->id }}" data-color="{{ $color->name }}" data-target="#deleteColor">Delete</a>
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
@include('shirt.color.modal')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#color-table').DataTable();
        $(this).on('click', '.edit-color-button', function(){
            $('#color-id').val($(this).attr('data-id'));
            $('#edit_category').val($(this).attr('data-category'));
            $('#edit_name').val($(this).attr('data-color'));
            $('#edit_colorpicker').val($(this).attr('data-colorpicker'));
        });
        $(this).on('click', '.delete-color-button', function(){
            $('#color-id-delete').val($(this).attr('data-id'));
            $('#delete-color-name').html($(this).attr('data-color'));
        });
    });
</script>
@endsection