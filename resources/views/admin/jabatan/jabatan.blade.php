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
                <a onclick="event.preventDefault();addJabatanForm();" href="#" class="btn btn-success" data-toggle="modal">
                    <i class="fas fa-plus">&#xE147;</i>
                    <span>
                        Tambah Jabatan Baru
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatans as $jab)
                        <tr>
                            <td>{{ $jab->id }}</td>
                            <td>{{ $jab->nama }}</td>
                            <td>
                                <a onclick="event.preventDefault();editJabatanForm({{ $jab->id }});" href="#"
                                    class="edit open-modal" data-toggle="modal" value="{{ $jab->id }}">
                                    <i class="fas fa-edit">&#xE147;</i>
                                </a>
                                <a onclick="event.preventDefault();deleteJabatanForm({{ $jab->id }});" href="#"
                                    class="delete" data-toggle="modal
                                    ">
                                    <i class="fas 
                                    fa-trash">&#xE147;</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $jabatans->count() }}</b> out of
                    <b>{{ $jabatans->total() }}</b>
                    entries
                </div> {{ $jabatans->links() }}
            </div>
        </div>
    </div>


    @include('admin.jabatan.jabatan_modal.jabatan_add')
    @include('admin.jabatan.jabatan_modal.jabatan_edit')
    @include('admin.jabatan.jabatan_modal.jabatan_delete')
@endsection
@section('js')
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
                    url: '/jabatan',
                    data: {
                        nama: $("#frmAddJabatan input[name=nama]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        swal.fire("Yeay!", "Jabatan Berhasil Ditambahkan", "success");
                        $('#frmAddJabatan').trigger("reset");
                        $("#frmAddJabatan .close").click();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-jabatan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-jabatan-errors').append('<li>' + value + '</li>');
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
                    url: '/jabatan/' + $("#frmEditJabatan input[name=jabatan_id]").val(),
                    data: {
                        nama: $("#frmEditJabatan input[name=nama]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#frmEditJabatan').trigger("reset");
                        $("#frmEditJabatan .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-jabatan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-jabatan-errors').append('<li>' + value + '</li>');
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
                    url: '/jabatan/' + $("#frmDeleteJabatan input[name=jabatan_id]").val(),
                    dataType: 'json',
                    success: function(data) {
                        $("#frmDeleteJabatan .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

        function addJabatanForm() {
            $(document).ready(function() {
                $("#add-error-bag").hide();
                $('#addJabatanModal').appendTo('body').modal('show');
            });
        }

        function editJabatanForm(jabatan_id) {
            $.ajax({
                type: 'GET',
                url: '/jabatan/' + jabatan_id,
                success: function(data) {
                    $("#edit-error-bag").hide();
                    $("#frmEditJabatan input[name=nama]").val(data.jabatans.nama);
                    $("#frmEditJabatan input[name=jabatan_id]").val(data.jabatans.id);
                    $('#editJabatanModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteJabatanForm(jabatan_id) {
            $.ajax({
                type: 'GET',
                url: '/jabatan/' + jabatan_id,
                success: function(data) {
                    $("#frmDeleteJabatan #delete-title").html("Delete Jabatan (" + data.jabatans.nama + ")?");
                    $("#frmDeleteJabatan input[name=jabatan_id]").val(data.jabatans.id);
                    $('#deleteJabatanModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection
