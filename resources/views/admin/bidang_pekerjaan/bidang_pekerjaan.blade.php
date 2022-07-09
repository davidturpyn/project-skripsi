@extends('layouts.admin.master')

<head>
    @section('title', 'Kotawaringin Barat')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="col-sm-6">
                <a onclick="event.preventDefault();addBidangPekerjaanForm();" href="#" class="btn btn-success"
                    data-toggle="modal">
                    <i class="fas fa-plus">&#xE147;</i>
                    <span>
                        Tambah Bidang Pekerjaan
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bidang Pekerjaan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bidang_pekerjaans as $bd)
                        <tr>
                            <td>{{$bd->id}}</td>
                            <td>{{ $bd->nama }}</td>
                            <td>
                                <a onclick="event.preventDefault();editBidangPekerjaanForm({{ $bd->id }});" href="#"
                                    class="edit open-modal" data-toggle="modal" value="{{ $bd->id }}">
                                    <i class="fas fa-edit">&#xE147;</i>
                                </a>
                                <a onclick="event.preventDefault();deleteBidangPekerjaanForm({{ $bd->id }});" href="#"
                                    class="delete" data-toggle="modal">
                                    <i class="fas fa-trash">&#xE147;</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $bidang_pekerjaans->count() }}</b> out of
                    <b>{{ $bidang_pekerjaans->total() }}</b> entries
                </div> {{ $bidang_pekerjaans->links() }}
            </div>
        </div>
    </div>


    @include('admin.bidang_pekerjaan.bidang_pekerjaan_modal.bidang_pekerjaan_add')
    @include('admin.bidang_pekerjaan.bidang_pekerjaan_modal.bidang_pekerjaan_edit')
    @include('admin.bidang_pekerjaan.bidang_pekerjaan_modal.bidang_pekerjaan_delete')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#btn-add").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/bidang_pekerjaan',
                    data: {
                        nama: $("#frmAddBidangPekerjaan input[name=nama]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#frmAddBidangPekerjaan').trigger("reset");
                        $("#frmAddBidangPekerjaan .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-bidang-pekerjaan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-bidang-pekerjaan-errors').append('<li>' + value + '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            });
            $("#btn-edit").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'PUT',
                    url: '/bidang_pekerjaan/' + $("#frmEditBidangPekerjaan input[name=bidang_pekerjaan_id]").val(),
                    data: {
                        nama: $("#frmEditBidangPekerjaan input[name=nama]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#frmEditBidangPekerjaan').trigger("reset");
                        $("#frmEditBidangPekerjaan .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-bidang-pekerjaan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-bidang-pekerjaan-errors').append('<li>' + value + '</li>');
                        });
                        $("#edit-error-bag").show();
                    }
                });
            });
            $("#btn-delete").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'DELETE',
                    url: '/bidang_pekerjaan/' + $("#frmDeleteBidangPekerjaan input[name=bidang_pekerjaan_id]").val(),
                    dataType: 'json',
                    success: function(data) {
                        $("#frmDeleteBidangPekerjaan .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

        function addBidangPekerjaanForm() {
            $(document).ready(function() {
                $("#add-error-bag").hide();
                $('#addBidangPekerjaanModal').appendTo('body').modal('show');
            });
        }

        function editBidangPekerjaanForm(bidang_pekerjaan_id) {
            $.ajax({
                type: 'GET',
                url: '/bidang_pekerjaan/' + bidang_pekerjaan_id,
                success: function(data) {
                    $("#edit-error-bag").hide();
                    $("#frmEditBidangPekerjaan input[name=nama]").val(data.bidang_pekerjaans.nama);
                    $("#frmEditBidangPekerjaan input[name=bidang_pekerjaan_id]").val(data.bidang_pekerjaans.id);
                    $('#editBidangPekerjaanModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteBidangPekerjaanForm(bidang_pekerjaan_id) {
            $.ajax({
                type: 'GET',
                url: '/bidang_pekerjaan/' + bidang_pekerjaan_id,
                success: function(data) {
                    $("#frmDeleteBidangPekerjaann #delete-title").html("Delete Bidang Pekerjaan (" + data
                        .bidang_pekerjaans.nama + ")?");
                    $("#frmDeleteBidangPekerjaan input[name=bidang_pekerjaan_id]").val(data.bidang_pekerjaans
                        .id);
                    $('#deleteBidangPekerjaanModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection
