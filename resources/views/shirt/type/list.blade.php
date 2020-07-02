@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Shirt - Type</div>

                <div class="card-body">
                    <div class="form-group">
                        <a class="btn btn-default border" href="{{ route('shirt') }}">Back</a>
                        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addType">New Type</a>
                    </div>
                    <div class="table-responsive">
                        <table id="type-table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($types as $type)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $type->name }}</td>
                                    <td class="text-center">
                                        <a href="#" class="edit-type-button" data-toggle="modal" data-id="{{ $type->id }}" data-type="{{ $type->name }}" data-target="#editType">Edit</a> 
                                        @if(!in_array($type->id, $type_exist))
                                        <a href="#" class="delete-type-button" data-toggle="modal" data-id="{{ $type->id }}" data-type="{{ $type->name }}" data-target="#deleteType">Delete</a>
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
@include('shirt.type.modal')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#type-table').DataTable();
        $(this).on('click', '.edit-type-button', function(){
            $('#type-id').val($(this).attr('data-id'));
            $('#edit_name').val($(this).attr('data-type'));
        });
        $(this).on('click', '.delete-type-button', function(){
            $('#type-id-delete').val($(this).attr('data-id'));
            $('#delete-type-name').html($(this).attr('data-type'));
        });
    });
</script>
@endsection