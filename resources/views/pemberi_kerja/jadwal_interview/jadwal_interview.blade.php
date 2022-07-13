@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Jadwal Interview</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/jadwal_interview">Jadwal Interview</a></div>
        </div>
    </div>
    <div class="card">
        @if ($errors->any())
            <div class="modal fade" id="errorJadwalInterview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Halo, {{ auth()->user()->firstname }}</h5>
                        </div>
                        <div class="modal-body">
                            <p>
                                Wah belum ada lowongan kerja yang terdaftar nih,
                                Yuk buat lowongan pekerjaan dulu,
                                kemudian jadwalkan interview untuk lowongan tersebut.
                            <p>
                            <ul>
                                <li>
                                    <p class="mb-0 fw-bold"> Membuat Lowongan Pekerjaan </p>
                                    <p>
                                        Layanan karirhub adalah layanan untuk publikasi lowongan kerja secara online dan
                                        mencari para talenta berbakat dengan data pencaker yang sudah tervalidasi dukcapil.
                                        Kamu juga dapat mempublikasi pekerjaan freelance / proyek lepas secara gratis!
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="{{ route('lowongan_kerja.index') }}">Menuju Lowongan
                                Kerja</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card-header">
                <div class="col-sm-6">
                    <a onclick="event.preventDefault();addJadwalInterviewForm();" href="#" class="btn btn-success"
                        data-toggle="modal">
                        <i class="fas fa-plus">&#xE147;</i>
                        <span>
                            Tambah Jadwal Interview
                        </span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Interview</th>
                            <th>Tanggal Interview</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($jadwal_interviews)
                            @foreach ($jadwal_interviews as $ji)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <a onclick="event.preventDefault();showDetailTenagaKerja({{ $ji->id }});"
                                            href="#" class="edit open-modal" data-toggle="modal"
                                            value="{{ $ji->id }}">
                                            {{ $ji->nama_interview }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($ji->tanggal_interview)->format('d-m-Y') }}, Jam
                                        {{ Carbon\Carbon::parse($ji->tanggal_interview)->format('H:i') }} WIB
                                    </td>
                                    <td>{{ $ji->alamat_interview }}</td>
                                    <td>
                                        <a onclick="event.preventDefault();editJadwalInterviewForm({{ $ji->id }});"
                                            href="#" class="edit open-modal" data-toggle="modal"
                                            value="{{ $ji->id }}">
                                            <i class="fas fa-edit">&#xE147;</i>
                                        </a>
                                        <a onclick="event.preventDefault();deleteJadwalInterviewForm({{ $ji->id }});"
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
                    <div class="hint-text">Showing <b>{{ $jadwal_interviews->count() }}</b> out of
                        <b>{{ $jadwal_interviews->total() }}</b> entries
                    </div> {{ $jadwal_interviews->links() }}
                </div>
            </div>
        @endif
    </div>

    @include('pemberi_kerja.jadwal_interview.jadwal_interview_modal.jadwal_interview_edit')
    @include('pemberi_kerja.jadwal_interview.jadwal_interview_modal.jadwal_interview_add')
    @include('pemberi_kerja.jadwal_interview.jadwal_interview_modal.jadwal_interview_delete')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var errorJadwalInterview = $('#errorJadwalInterview');
            if (errorJadwalInterview) {
                errorJadwalInterview.appendTo('body').modal('show');
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#btn-add-jadwal").click(function() {
                $.ajax({
                    type: 'POST',
                    url: '/jadwal_interview',
                    data: {
                        nama: $("#frmAddJadwalInterview input[name=nama_interview]").val(),
                        tanggal: $("#frmAddJadwalInterview input[name=tanggal_interview]").val(),
                        alamat: $("#frmAddJadwalInterview input[name=alamat_interview]").val(),
                        keterangan_jadwal: $("#keterangan_jadwal").val(),
                        id_lowongan: $("#id_lowongan_kerja_jadwal").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#frmAddJadwalInterview .close").click();
                        Swal.fire('Yeay, Jadwal interview berhasil ditambahkan!', 'OK!',
                            'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-jadwal-interview-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-jadwal-interview-errors').append('<li>' + value +
                                '</li>');
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
                    url: '/jadwal_interview/' + $(
                        "#frmEditJadwalInterview input[name=jadwal_interview_id]").val(),
                    data: {
                        nama: $("#frmEditJadwalInterview input[name=nama_interview_edit]").val(),
                        tanggal: $("#frmEditJadwalInterview input[name=tanggal_interview_edit]")
                            .val(),
                        alamat: $("#frmEditJadwalInterview input[name=alamat_interview_edit]")
                            .val(),
                        keterangan_jadwal: $("#keterangan_edit").val(),
                        id_lowongan: $("#id_lowongan_kerja_edit").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#frmEditJadwalInterview .close").click();
                        Swal.fire('Yeay, Jadwal interview berhasil diubah!', 'OK!',
                            'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-jadwal-interview-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-jadwal-interview-errors').append('<li>' + value +
                                '</li>');
                        });
                        $("#edit-error-bag").show();
                    }
                });
            });

            $("#btn-delete").click(function() {
                $.ajax({
                    type: 'DELETE',
                    url: '/jadwal_interview/' + $(
                            "#frmDeleteJadwalInterview input[name=jadwal_interview_id]")
                        .val(),
                    dataType: 'json',
                    success: function(data) {
                        $("#frmDeleteJadwalInterview .close").click();
                        Swal.fire('Yeay, Jadwal interview berhasil dihapus!', 'OK!',
                            'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

        });

        function addJadwalInterviewForm() {
            $(document).ready(function() {
                $('#add-error-bag').hide();
                $('#addJadwalInterviewModal').appendTo('body').modal('show');
            });
        }

        function editJadwalInterviewForm(jadwal_interview_id) {
            $.ajax({
                type: 'GET',
                url: '/jadwal_interview/' + jadwal_interview_id,
                success: function(data) {
                    $('#add-error-bag').hide();
                    var tanggal = new Date(data.jadwal_interviews.tanggal_interview);
                    var tahun = tanggal.getFullYear();
                    var bulan = (1 + tanggal.getMonth()).toString().padStart(2, '0');
                    var hari = tanggal.getDate().toString().padStart(2, '0');
                    var menit = tanggal.getMinutes().toString().padStart(2, '0');
                    var jam = tanggal.getHours().toString().padStart(2, '0');
                    var hasilTanggal = tahun + "-" + bulan + "-" + hari + "T" + jam + ":" + menit;
                    $("#edit-error-bag").hide();
                    $("#id_lowongan_kerja_edit").val(data.jadwal_interviews.id_lowongan_kerja);
                    $("#frmEditJadwalInterview input[name=nama_interview_edit]").val(data.jadwal_interviews
                        .nama_interview);
                    $("#frmEditJadwalInterview input[name=tanggal_interview_edit]").val(hasilTanggal);
                    $("#frmEditJadwalInterview input[name=alamat_interview_edit]").val(data.jadwal_interviews
                        .alamat_interview);
                    $("#keterangan_edit").val(data.jadwal_interviews.keterangan);
                    $("#frmEditJadwalInterview input[name=jadwal_interview_id]").val(data.jadwal_interviews.id);
                    $('#editJadwalInterviewModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteJadwalInterviewForm(jadwal_interview_id) {
            $.ajax({
                type: 'GET',
                url: '/jadwal_interview/' + jadwal_interview_id,
                success: function(data) {
                    $("#frmDeleteJadwalInterview #delete-title").html("Konfirmasi");
                    $("#frmDeleteJadwalInterview input[name=jadwal_interview_id]").val(data.jadwal_interviews
                        .id);
                    $('#deleteJadwalInterviewModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        // function showDetailJadwalInterview(id) {
        //     $.ajax({
        //         type: 'GET',
        //         url: '/mencari_pekerja/' + nik,
        //         success: function(data) {
        //             $("#edit-error-bag").hide();
        //             $("#deskripsi_profil").text(data.data_pencari_kerjas.deskripsi_profil);
        //             $("#tempat_lahir").text(data.data_pencari_kerjas.tempat_lahir);
        //             $("#agama").text(data.data_pencari_kerjas.agama);
        //             $("#tgl_lahir").text(data.data_pencari_kerjas.tgl_lahir);
        //             $("#jenis_kelamin").text(data.data_pencari_kerjas.jenis_kelamin);
        //             $("#kota_dom").text(data.data_pencari_kerjas.kota_dom);
        //             $("#provinsi_dom").text(data.data_pencari_kerjas.provinsi_dom);
        //             $("#kota_ktp").text(data.data_pencari_kerjas.kota_ktp);
        //             $("#provinsi_ktp").text(data.data_pencari_kerjas.provinsi_ktp);
        //             $("#telepon").text(data.data_pencari_kerjas.telepon);
        //             $("#email").text(data.data_pencari_kerjas.email);
        //             $('#showDetailPekerjaModal').appendTo('body').modal('show');
        //         },
        //         error: function(data) {
        //             console.log(data);
        //         }
        //     });
        // }
    </script>
@endsection
