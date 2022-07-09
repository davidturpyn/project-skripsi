@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Mencari Pekerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/mencari_pekerja">Mencari Pekerja</a></div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-3 g-3">
            @if ($data_pencari_kerjas)
                @foreach ($data_pencari_kerjas as $data)
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-grid">
                                <img class="w-25"
                                    src="https://wajiblapor.kemnaker.go.id/assets/images/no-image.svg" name="imgProfile">
                                <strong>
                                    <label class="fs-4" for="">
                                        <a onclick="event.preventDefault();showDetailPencariKerja({{ $data->nik }});"
                                            href="#" class="edit open-modal" data-toggle="modal"
                                            value="{{ $data->nik }}">
                                            {{ $data->users->name }}
                                        </a>
                                    </label>
                                </strong>
                                {{-- <label class="fs-5" for="">{{ $data->pendidikan->bidang_studi }}</label> --}}
                                <p class="fs-9 text-wrap" for=""><i class="fas fa-map-marker-alt"></i>
                                    {{ ucwords(strtolower($data->kota_dom)) . ', ' . ucwords(strtolower($data->provinsi_dom)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @include('pemberi_kerja.mencari_pekerja.mencari_pekerja_modal.mencari_pekerja_detail');
    <script>
        function showDetailPencariKerja(nik) {

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
                    $("#status").text(data.data_pencari_kerjas.status);
                    
                    $('#showDetailPekerjaModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection
