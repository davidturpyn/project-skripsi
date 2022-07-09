@extends('layouts.pemberi_kerja.master')

<head>
    @section('title', 'Kotawaringin Barat')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@section('content')
    <div class="section-header">
        <h1>Tenaga Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/tenaga_kerja">Tenaga Kerja</a></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="col-sm-6">
                <a onclick="event.preventDefault();addTenagaKerjaForm();" href="#" class="btn btn-success"
                    data-toggle="modal">
                    <i class="fas fa-plus">&#xE147;</i>
                    <span>
                        Tambah Tenaga Kerja
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($tenaga_kerjas)
                        @foreach ($tenaga_kerjas as $tk)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <a onclick="event.preventDefault();showDetailTenagaKerja({{ $tk->nik }});" href="#"
                                        class="edit open-modal" data-toggle="modal" value="{{ $tk->nik }}">
                                        {{ $tk->nik }}
                                    </a>
                                </td>
                                <td>
                                    {{ $tk->nama_lengkap }}
                                </td>
                                <td>{{ $tk->jabatan->nama }}</td>
                                <td>{{ $tk->alamat }}</td>
                                <td>
                                    <a onclick="event.preventDefault();editTenagaKerjaForm({{ $tk->id }});" href="#"
                                        class="edit open-modal" data-toggle="modal" value="{{ $tk->id }}">
                                        <i class="fas fa-edit">&#xE147;</i>
                                    </a>
                                    <a onclick="event.preventDefault();deleteTenagaKerjaForm({{ $tk->id }});"
                                        href="#" class="delete" data-toggle="modal">
                                        <i class="fas fa-trash">&#xE147;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $tenaga_kerjas->count() }}</b> out of
                    <b>{{ $tenaga_kerjas->total() }}</b> entries
                </div> {{ $tenaga_kerjas->links() }}
            </div>
        </div>
    </div>

    @include(
        'pemberi_kerja.mencari_pekerja.mencari_pekerja_modal.mencari_pekerja_detail'
    );
    @include(
        'pemberi_kerja.tenaga_kerja.tenaga_kerja_modal.tenaga_kerja_add'
    )
    @include(
        'pemberi_kerja.tenaga_kerja.tenaga_kerja_modal.tenaga_kerja_delete'
    )

    <div class="modal fade" tabindex="-1" id="editTenagaKerjaModal">
        <div class="modal-dialog">
            <div class="modal-content" id="editTenagaKerjaModalContent">

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#btn-add").click(function() {
                var temp_disabilitas = "";
                $.ajax({
                    type: 'POST',
                    url: '/tenaga_kerja',
                    data: {
                        nik: $("#frmAddTenagaKerja input[name=nik]").val(),
                        nama_lengkap: $("#frmAddTenagaKerja input[name=nama_lengkap]").val(),
                        id_jabatan: $("#id_jabatan").val(),
                        pendidikan: $("#pendidikan").val(),
                        status_pekerja: $("#status_pekerja").val(),
                        jenis_kelamin: $("#jenis_kelamin_add").val(),
                        tgl_lahir: $("#frmAddTenagaKerja input[name=tgl_lahir]").val(),
                        tgl_diterima: $("#frmAddTenagaKerja input[name=tgl_diterima]").val(),
                        bekerja: $("#frmAddTenagaKerja input[name=bekerja]:checked").val(),
                        disabilitas: $("#frmAddTenagaKerja input[name=disabilitas]:checked").val(),
                        alamat: $("#alamat_tenaga_kerja").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        swal.fire("Yeay!", "Tenaga Kerja Berhasil Ditambahkan", "success");
                        $('#frmAddTenagaKerja').trigger("reset");
                        $("#frmAddTenagaKerja .close").click();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-tenaga-kerja-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-tenaga-kerja-errors').append('<li>' + value +
                                '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            });

            $("#btn-delete").click(function() {
                $.ajax({
                    type: 'DELETE',
                    url: '/tenaga_kerja/' + $("#frmDeleteTenagaKerja input[name=tenaga_kerja_id]")
                        .val(),
                    dataType: 'json',
                    success: function(data) {
                        $("#frmDeleteTenagaKerja .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });

        function showDetailTenagaKerja(nik) {
            $.ajax({
                type: 'GET',
                url: '/mencari_pekerja/' + nik,
                success: function(data) {
                    $("#edit-error-bag").hide();
                    $("#deskripsi_profil").text(data.data_pencari_kerjas.deskripsi_profil);
                    $("#tempat_lahir").text(data.data_pencari_kerjas.tempat_lahir);
                    $("#agama").text(data.data_pencari_kerjas.agama);
                    $("#tgl_lahir").text(data.data_pencari_kerjas.tgl_lahir);
                    $("#jenis_kelamin").text(data.data_pencari_kerjas.jenis_kelamin);
                    $("#kota_dom").text(data.data_pencari_kerjas.kota_dom);
                    $("#provinsi_dom").text(data.data_pencari_kerjas.provinsi_dom);
                    $("#kota_ktp").text(data.data_pencari_kerjas.kota_ktp);
                    $("#provinsi_ktp").text(data.data_pencari_kerjas.provinsi_ktp);
                    $("#telepon").text(data.data_pencari_kerjas.telepon);
                    $("#email").text(data.data_pencari_kerjas.email);
                    $('#showDetailPekerjaModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function addTenagaKerjaForm() {
            $(document).ready(function() {
                $("#add-error-bag").hide();
                $('#addTenagaKerjaModal').appendTo('body').modal('show');
            });
        }

        function editTenagaKerjaForm(tenaga_kerja_edit_id) {
            $.ajax({
                type: 'GET',
                url: '/tenaga_kerja/' + tenaga_kerja_edit_id + '/edit',
                success: function(data) {
                    $('#editTenagaKerjaModal').appendTo('body').modal('show');
                    $('#editTenagaKerjaModalContent').html('');
                    $('#editTenagaKerjaModalContent').html(data);
                    $("#btn-edit").click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            type: 'PUT',
                            url: '/tenaga_kerja/' + tenaga_kerja_edit_id,
                            data: {
                                nik: $("#nik_edit").val(),
                                nama_lengkap: $(
                                        "#nama_lengkap_edit")
                                    .val(),
                                id_jabatan: $("#id_jabatan_edit").val(),
                                pendidikan: $("#pendidikan_edit").val(),
                                status_pekerja: $("#status_pekerja_edit").val(),
                                jenis_kelamin: $("#jenis_kelamin_edit").val(),
                                tgl_lahir: $("#tgl_lahir_edit")
                                    .val(),
                                tgl_diterima: $(
                                        "#tgl_diterima_edit")
                                    .val(),
                                bekerja: $("#frmEditTenagaKerja input[name=bekerja]:checked")
                                    .val(),
                                disabilitas: $(
                                        "#frmEditTenagaKerja input[name=disabilitas]:checked")
                                    .val(),
                                alamat: $("#alamat_tenaga_kerja_edit").val(),
                            },
                            dataType: 'json',
                            success: function(data) {
                                $('#frmEditTenagaKerja').trigger("reset");
                                $("#frmEditTenagaKerja .close").click();
                                window.location.reload();
                            },
                            error: function(data) {
                                var errors = $.parseJSON(data.responseText);
                                $('#edit-tenaga-kerja-errors').html('');
                                $.each(errors.messages, function(key, value) {
                                    $('#edit-tenaga-kerja-errors').append('<li>' +
                                        value +
                                        '</li>');
                                });
                                $("#edit-error-bag").show();
                            }
                        });
                    });

                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteTenagaKerjaForm(tenaga_kerja_id) {
            $.ajax({
                type: 'GET',
                url: '/tenaga_kerja/' + tenaga_kerja_id,
                success: function(data) {
                    $("#frmDeleteTenagaKerja #delete-title").html("Konfirmasi");
                    $("#frmDeleteTenagaKerja input[name=tenaga_kerja_id]").val(data.tenaga_kerjas.id);
                    $('#deleteTenagaKerjaModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection
