@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Pelaporan Perusahaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/pelaporan_perusahaan">pelaporan Perusahaan</a></div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            @if ($errors->any())
                <div class="modal fade" id="errorPelaporan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    @if ($pelaporans->count())
                        <div class="col-sm-6">
                            <a id="buat-laporan" data-tgl_berlapor_laporan='{{ $tgl_berlapor_laporans[0] }}'
                                data-tgl_berlaku_laporan='{{ $tgl_berlaku_laporans[0] }}'
                                data-status_laporan='{{ $status_laporans[0] }}' class="btn btn-success "
                                data-toggle="modal">
                                <i class="fas fa-plus">&#xE147;</i>
                                <span>
                                    Buat laporan
                                </span>
                            </a>
                        </div>
                    @else
                        <div class="col-sm-6">
                            <a id="buat-laporan" data-pelaporan='kosong' class="btn btn-success " data-toggle="modal">
                                <i class="fas fa-plus">&#xE147;</i>
                                <span>
                                    Buat laporan
                                </span>
                            </a>
                        </div>
                    @endif

                    <div class="col-sm-6">
                        <a href="{{ route('export_pdf') }}" class="btn btn-success " data-toggle="modal">
                            <i class="fas fa-plus">&#xE147;</i>
                            <span>
                                Export
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No. Laporan</th>
                                <th>Status</th>
                                <th>Tanggal laporan</th>
                                <th>Berlaku Sampai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pelaporans)
                                @foreach ($pelaporans as $p)
                                    <tr>
                                        <td>
                                            <a href="http://example.com">
                                                {{ $p->id }}
                                            </a>
                                        </td>

                                        <td>{{ $p->status }}</td>
                                        <td>{{ $p->tgl_berlapor }}</td>
                                        <td>{{ $p->tgl_berlaku }}</td>
                                        <td>
                                            <a onclick="event.preventDefault();editJabatanForm();" href="#"
                                                class="edit open-modal" data-toggle="modal" value="">
                                                <i class="fas fa-print">&#xE147; CETAK</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>{{ $pelaporans->count() }}</b> out of
                            <b>{{ $pelaporans->total() }}</b>
                            entries
                        </div> {{ $pelaporans->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var errorPelaporan = $('#errorPelaporan');
            if (errorPelaporan) {
                errorPelaporan.appendTo('body').modal('show');
            }
            @if (isset($data_pemberi_kerjas))
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var {
                    tgl_berlapor_laporan,
                    tgl_berlaku_laporan,
                    status_laporan,
                    pelaporan
                } = $('#buat-laporan').data();
                var conv_berlapor = Date.parse(tgl_berlapor_laporan);
                var conv_berlaku = Date.parse(tgl_berlaku_laporan);
                var dt_now = new Date().getTime();
                $('#buat-laporan').click(function() {
                    if (pelaporan == "kosong" || status_laporan == "Tidak Berlaku" || dt_now >
                        conv_berlaku) {
                        var tanggal_sekarang = new Date();
                        var tgl_lapor = tanggal_sekarang.getFullYear() + "-" + tanggal_sekarang.getMonth() +
                            "-" +
                            tanggal_sekarang.getDate();
                        var tgl_laku = (tanggal_sekarang.getFullYear() + 1) + "-" + tanggal_sekarang
                            .getMonth() +
                            "-" + tanggal_sekarang.getDate();
                        $.ajax({
                            type: 'POST',
                            url: '/pelaporan_perusahaan',
                            data: {
                                status: 'Berlaku',
                                tgl_berlapor: tgl_lapor,
                                tgl_berlaku: tgl_laku,
                            },
                            success: function(data) {
                                Swal.fire('Yeay, Pelaporan berhasil dibuat!', 'OK!',
                                    'success');
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        // alert(tanggal_sekarang);
                    } else if (dt_now > conv_berlapor && dt_now < conv_berlaku && status_laporan ==
                        "Berlaku") {
                        Swal.fire('Wah, Laporan masih berlaku nih dari tanggal ' + tgl_berlapor_laporan +
                            ' sampai ' + tgl_berlaku_laporan, 'OK!',
                            'info');
                    }
                });
            @endif

        });
    </script>
@endsection
