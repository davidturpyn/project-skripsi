@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Daftar Lowongan Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/lowongan_kerja">Lowongan Kerja</a></div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            @if ($errors->any())
                <div class="modal fade" id="errorLowonganKerja" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Halo, {{ auth()->user()->firstname }}
                                </h5>
                            </div>
                            <div class="modal-body">
                                <p>Yuk lengkapi profil perusahaan kamu untuk mendaftar di layanan - layanan ketenagakerjaan
                                    seperti:
                                <p>
                                <ul>
                                    <li>
                                        <p class="mb-0 fw-bold"> Membuat Lowongan Pekerjaan </p>
                                        <p>
                                            Layanan karirhub adalah layanan untuk publikasi lowongan kerja secara online dan
                                            mencari para talenta berbakat dengan data pencaker yang sudah tervalidasi
                                            dukcapil. Kamu juga dapat mempublikasi pekerjaan freelance / proyek lepas secara
                                            gratis!
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="{{ route('profil_pemberi_kerja.index') }}">Menuju Profil
                                    Perusahaan</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-header">
                    <div class="col-sm-6">
                        <a href="{{ route('lowongan_kerja.create') }}" class="btn btn-success" data-toggle="modal">
                            <i class="fas fa-plus">&#xE147;</i>
                            <span>
                                TAMBAH LOWONGAN
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Pekerjaan</th>
                                <th>Tanggal</th>
                                <th>Min. Pendidikan</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Jumlah</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lowongan_kerjas as $lk)
                                <tr>
                                    <td>
                                        <a href="">
                                            {{ $lk->judul_pekerjaan }}
                                        </a>
                                    </td>
                                    <td>{{ $lk->tanggal_tayang }}</td>
                                    <td>{{ $lk->minimal_pendidikan }}</td>
                                    <td>{{ $lk->jenis_pekerjaan }}</td>
                                    <td>{{ $lk->kuota }}</td>
                                    <td>
                                        <a href="{{ route('lowongan_kerja.show', ['id' => $lk->id]) }}"
                                            class="edit open-modal" data-toggle="modal" value="">
                                            <i class="fas fa-edit">&#xE147;</i>
                                        </a>
                                        <a onclick="event.preventDefault();deleteLowonganKerjaForm({{ $lk->id }});"
                                            href="#" class="delete" data-toggle="modal">
                                            <i class="fas fa-trash">&#xE147;</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>{{ $lowongan_kerjas->count() }}</b> out of
                            <b>{{ $lowongan_kerjas->total() }}</b>
                            entries
                        </div> {{ $lowongan_kerjas->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
    {{-- Detail setelah ditekan judul pekerjaan --}}
    {{-- <div class="container bordir">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <strong><label class="fs-4" for="">Judul Pekerjaan</label></strong>
                </div>
                <div class="row">
                    <label class="fs-6" for="">Alamat </label>
                </div>

                <label class="fs-5" for="">jenis industri</label>
            </div>
        </div>
        <ul class="nav nav-pills nav-fill mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-lamaran-tab" data-bs-toggle="pill" data-bs-target="#pills-lamaran"
                    type="button" role="tab" aria-controls="pills-lamaran" aria-selected="true">
                    Lamaran
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-bookmark-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-bookmark" type="button" role="tab" aria-controls="pills-bookmark"
                    aria-selected="false">
                    Bookmark
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-wawancara-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-wawancara" type="button" role="tab" aria-controls="pills-wawancara"
                    aria-selected="false">
                    Wawancara
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-diterima-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-diterima" type="button" role="tab" aria-controls="pills-diterima"
                    aria-selected="false">
                    Diterima
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-ditolak-tab" data-bs-toggle="pill" data-bs-target="#pills-ditolak"
                    type="button" role="tab" aria-controls="pills-ditolak" aria-selected="false">
                    Ditolak
                </button>
            </li>
        </ul>
        <div class="card">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-lamaran" role="tabpanel"
                    aria-labelledby="pills-lamaran-tab">
                    <div class="form-group row">
                        <div class="row row-cols-3 g-3">
                            @for ($i = 0; $i <= 7; $i++)
                                <div class="col w-25">
                                    <div class="card">
                                        <div class="card-body d-grid">
                                            <img class="w-25"
                                                src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg"
                                                name="imgProfile">
                                            <strong><label class="fs-4" for="">{{ $i }} nama
                                                    perusahaan</label></strong>
                                            <label class="fs-6" for="">{{ $i }} jenis industri</label>
                                            <label class="fs-5" for="">{{ $i }} jenis industri</label>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-bookmark" role="tabpanel" aria-labelledby="pills-bookmark-tab">
                    <div class="form-group row">
                        <div class="form-group row">
                            <div class="row row-cols-3 g-3">
                                @for ($i = 0; $i <= 7; $i++)
                                    <div class="col w-25">
                                        <div class="card">
                                            <div class="card-body d-grid">
                                                <img class="w-25"
                                                    src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg"
                                                    name="imgProfile">
                                                <strong><label class="fs-4" for="">{{ $i }} nama
                                                        perusahaan</label></strong>
                                                <label class="fs-6" for="">{{ $i }} jenis
                                                    industri</label>
                                                <label class="fs-5" for="">{{ $i }} jenis
                                                    industri</label>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-wawancara" role="tabpanel" aria-labelledby="pills-wawancara-tab">
                    <div class="form-group row">
                        <div class="row row-cols-3 g-3">
                            @for ($i = 0; $i <= 7; $i++)
                                <div class="col w-25">
                                    <div class="card">
                                        <div class="card-body d-grid">
                                            <img class="w-25"
                                                src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg"
                                                name="imgProfile">
                                            <strong><label class="fs-4" for="">{{ $i }} nama
                                                    perusahaan</label></strong>
                                            <label class="fs-6" for="">{{ $i }} jenis
                                                industri</label>
                                            <label class="fs-5" for="">{{ $i }} jenis
                                                industri</label>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-diterima" role="tabpanel" aria-labelledby="pills-diterima-tab">
                    <div class="form-group row">
                        <div class="row row-cols-3 g-3">
                            @for ($i = 0; $i <= 7; $i++)
                                <div class="col w-25">
                                    <div class="card">
                                        <div class="card-body d-grid">
                                            <img class="w-25"
                                                src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg"
                                                name="imgProfile">
                                            <strong><label class="fs-4" for="">{{ $i }} nama
                                                    perusahaan</label></strong>
                                            <label class="fs-6" for="">{{ $i }} jenis
                                                industri</label>
                                            <label class="fs-5" for="">{{ $i }} jenis
                                                industri</label>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-ditolak" role="tabpanel" aria-labelledby="pills-ditolak-tab">
                    <div class="form-group row">
                        <div class="row row-cols-3 g-3">
                            @for ($i = 0; $i <= 7; $i++)
                                <div class="col w-25">
                                    <div class="card">
                                        <div class="card-body d-grid">
                                            <img class="w-25"
                                                src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg"
                                                name="imgProfile">
                                            <strong><label class="fs-4" for="">{{ $i }}
                                                    nama
                                                    perusahaan</label></strong>
                                            <label class="fs-6" for="">{{ $i }} jenis
                                                industri</label>
                                            <label class="fs-5" for="">{{ $i }} jenis
                                                industri</label>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@include('pemberi_kerja.lowongan_kerja.modal_delete.lowongan_kerja_delete')
@section('js')
    <script>
        $(document).ready(function() {
            var errorLowonganKerja = $('#errorLowonganKerja');
            if (errorLowonganKerja) {
                errorLowonganKerja.appendTo('body').modal('show');
            }
            @if (isset($data_pemberi_kerjas))
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#btn-delete").click(function() {
                    $.ajax({
                        type: 'DELETE',
                        url: '/lowongan_kerja/' + $(
                                "#frmDeleteLowonganKerja input[name=lowongan_kerja_id]")
                            .val() + '/delete',
                        dataType: 'json',
                        success: function(data) {
                            $("#frmDeleteLowonganKerja .close").click();
                            Swal.fire('Yeay, Lowongan kerja berhasil dihapus!', 'OK!',
                                'success');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        },
                        error: function(data) {
                            Swal.fire(data, 'Aduh!',
                                'error');
                        }
                    });
                });
            @endif
        });

        function deleteLowonganKerjaForm(lowongan_kerja_id) {
            $.ajax({
                type: 'GET',
                url: '/lowongan_kerja/' + lowongan_kerja_id + '/edit',
                success: function(data) {
                    $("#frmDeleteLowonganKerja #delete-title").html("Konfirmasi");
                    $("#frmDeleteLowonganKerja input[name=lowongan_kerja_id]").val(data.lowongan_kerjas.id);
                    $('#deleteLowonganKerjaModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    Swal.fire(data, 'Aduh!',
                        'error');
                }
            });
        };
    </script>
@endsection
