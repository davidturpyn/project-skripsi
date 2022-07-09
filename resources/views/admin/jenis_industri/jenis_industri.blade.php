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
                <a onclick="event.preventDefault();addJenisIndustriForm();" href="#"class="btn btn-success" data-toggle="modal">
                    <i class="fas fa-plus">&#xE147;</i> 
                    <span>
                        Tambah Jenis Industri
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
                    @foreach($jenis_industris as $ji)
                    <tr>
                        <td>{{$ji->id}}</td>
                        <td>{{$ji->nama}}</td>
                        <td>
                            <a onclick="event.preventDefault();editJenisIndustriForm({{$ji->id}});" href="#"
                                class="edit open-modal" data-toggle="modal" value="{{$ji->id}}">
                                <i class="fas fa-edit">&#xE147;</i>
                            </a>
                            <a onclick="event.preventDefault();deleteJenisIndustriForm({{$ji->id}});" href="#" class="delete"
                                data-toggle="modal">
                                <i class="fas fa-trash">&#xE147;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{$jenis_industris->count()}}</b> out of <b>{{$jenis_industris->total()}}</b> entries
                </div> {{ $jenis_industris->links() }}
            </div>
        </div>
    </div>


    @include('admin.jenis_industri.jenis_industri_modal.jenis_industri_add')
    @include('admin.jenis_industri.jenis_industri_modal.jenis_industri_edit')
    @include('admin.jenis_industri.jenis_industri_modal.jenis_industri_delete') 
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
                    url: '/jenis_industri',
                    data: {
                        nama: $("#frmAddJenisIndustri input[name=nama]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#frmAddJenisIndustri').trigger("reset");
                        $("#frmAddJenisIndustri .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-jenis-industri-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-jenis-industri-errors').append('<li>' + value + '</li>');
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
                    url: '/jenis_industri/' + $("#frmEditJenisIndustri input[name=jenis_industri_id]").val(),
                    data: {
                        nama: $("#frmEditJenisIndustri input[name=nama]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#frmEditJenisIndustri').trigger("reset");
                        $("#frmEditJenisIndustri .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-jenis-industri-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-jenis-industri-errors').append('<li>' + value + '</li>');
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
                    url: '/jenis_industri/' + $("#frmDeleteJenisIndustri input[name=jenis_industri_id]").val(),
                    dataType: 'json',
                    success: function(data) {
                        $("#frmDeleteJenisIndustri .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

        function addJenisIndustriForm() {
            $(document).ready(function() {
                $("#add-error-bag").hide();
                $('#addJenisIndustriModal').appendTo('body').modal('show');
            });
        }

        function editJenisIndustriForm(jenis_industri_id) {
            $.ajax({
                type: 'GET',
                url: '/jenis_industri/' + jenis_industri_id,
                success: function(data) {
                    $("#edit-error-bag").hide();
                    $("#frmEditJenisIndustri input[name=nama]").val(data.jenis_industris.nama);
                    $("#frmEditJenisIndustri input[name=jenis_industri_id]").val(data.jenis_industris.id);
                    $('#editJenisIndustriModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteJenisIndustriForm(jenis_industri_id) {
            $.ajax({
                type: 'GET',
                url: '/jenis_industri/' + jenis_industri_id,
                success: function(data) {
                    $("#frmDeleteJenisIndustri #delete-title").html("Delete Jenis Industri (" + data
                        .jenis_industris.nama + ")?");
                    $("#frmDeleteJenisIndustri input[name=jenis_industri_id]").val(data.jenis_industris
                        .id);
                    $('#deleteJenisIndustriModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection
