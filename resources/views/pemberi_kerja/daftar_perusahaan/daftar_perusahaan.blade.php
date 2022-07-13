@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Daftar Perusahaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/daftar_perusahaan">Daftar Perusahaan</a></div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-3 g-3">
            @if ($data_pemberi_kerjas)
                @foreach ($data_pemberi_kerjas as $data)
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-grid">
                                <img class="w-25"
                                    src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg" name="imgProfile">
                                <strong>
                                    <label class="fs-4" for="">
                                        <a onclick="event.preventDefault();showDetailPerusahaan({{ $data->id }});"
                                            href="#" class="edit open-modal" data-toggle="modal"
                                            value="{{ $data->id }}">
                                            {{ $data->nama_perusahaan }}
                                        </a>
                                    </label>
                                </strong>
                                <label class="fs-5" for="">{{ $data->jenis_industri->nama }}</label>
                                <p class="fs-9 text-wrap" for=""><i class="fas fa-map-marker-alt"></i>
                                    {{ ucwords(strtolower($data->villages->name))}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @include('pemberi_kerja.daftar_perusahaan.daftar_perusahaan_modal.daftar_perusahaan_detail')
@endsection

@section('js');
    <script>
        function showDetailPerusahaan(daftar_perusahaan_id) {
            $.ajax({
                type: 'GET',
                url: '/daftar_perusahaan/' + daftar_perusahaan_id,
                success: function(data) {
                    $("#edit-error-bag").hide();
                    $("#url_banner").attr('src', 'storage/' + data.data_pemberi_kerjas.url_banner);
                    $("#nama").text(data.data_pemberi_kerjas.nama_perusahaan);
                    $("#tentang_perusahaan").text(data.data_pemberi_kerjas.tentang_perusahaan);
                    $("#tlpn_perusahaan").text(data.data_pemberi_kerjas.telepon_perusahaan);
                    $("#email_perusahaan").text(data.data_pemberi_kerjas.email_perusahaan);
                    $("#nama_jalan").text(data.data_pemberi_kerjas.nama_jalan);
                    $('#showDetailPerusahaanModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    Swal.fire(data, 'Aduh!',
                        'error');
                }
            });
        }
    </script>
@endsection
