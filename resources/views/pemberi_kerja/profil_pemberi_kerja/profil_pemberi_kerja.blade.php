@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('head')
    <style>
        .overlay {
            opacity: 0;
            top: 0;
            left: 0;
        }

        .image-container:hover .overlay {
            opacity: 1;
            cursor: pointer;
        }

    </style>
@endsection

@section('content')
    <div class="section-header">
        <h1>Profil Perusahaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/profil_pemberi_kerja">Profil</a></div>
        </div>
    </div>
    <div class="card">
        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Profil Perusahaan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    Legalitas Perusahaan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    Status Perusahaan
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @if (!$data_pemberi_kerjas)
                    <div class="card-body">
                        <h1><b> PROFIL PERUSAHAAN </b></h1>
                        <label> Data-data Umum pada profile perusahaan dapat diisi dibawah ini :</label>
                        <div class="form-group row">
                            <p> <b>GAMBAR PERUSAHAAN</b></p>
                            <div class="col-md-12">
                                <label> Banner</label>
                                <input id="imgBanner" type="file" name="imgBanner" class="form-control"
                                    onchange="previewBanner(this)" accept="image/jpeg">
                                <img id="previewImgBanner" name="previewImgBanner"
                                    style="max-width:130px;margin-top:20px;" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>PROFIL</b></p>
                            <div class="col-md-6">
                                <label>Nama Perusahaan</label>
                                <input input id="nama_perusahaan" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal berdiri</label>
                                <input input id="tanggal_berdiri" type="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>CABANG</b></p>
                            <div class="col-md-6">
                                <label>Jumlah Cabang di Indonesia</label>
                                <input input id="jumlah_cabang_dalam_negeri" type="text" class="form-control" value=""
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Cabang di Luar Negeri</label>
                                <input input id="jumlah_cabang_luar_negeri" type="text" class="form-control" value=""
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>ALAMAT</b></p>
                            <div class="col-md-6">
                                <label>Provinsi</label>
                                <select id="provinsi" class="form-control" name="provinsi" required="">
                                    <option value=""></option>
                                    @foreach ($provinsis as $pro)
                                        <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Kabupaten</label>
                                <select id="kabupaten" disabled class="form-control" name="kabupaten" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Kecamatan</label>
                                <select id="kecamatan" disabled class="form-control" name="kecamatan" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Kelurahan</label>
                                <select id="kelurahan" disabled class="form-control" name="kelurahan" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Nama Jalan</label>
                            <div class="col-md-12">
                                <input input id="nama_jalan" type="text" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>INFORMASI TAMBAHAN</b></p>
                            <div class="col-md-12">
                                <label>Jenis Industri</label>
                                <select id="id_jenis_industri" class="form-control" name="id_jenis_industri" required="">
                                    <option value=""></option>
                                    @foreach ($jenis_industris as $ji)
                                        <option value="{{ $ji->id }}">{{ $ji->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Telp. Perusahaan</label>
                                <input input id="tlpn_perusahaan" type="text" class="form-control" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label>Email Perusahaan</label>
                                <input input id="email_perusahaan" type="text" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Website Perusahaan</label>
                            <input input id="website_perusahaan" type="text" class="form-control" value="" required>
                        </div>

                        <div class="form-group row">
                            <label>Tentang Perusahaan</label>
                            <input input id="tentang_perusahaan" type="text" class="form-control" value="" required>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="hapus-form-data-perusahaan" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" id="btn-add-data-perusahaan" class="btn btn-primary" data-type="add">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <h1><b> PROFIL PERUSAHAAN </b></h1>
                        <label> Data-data Umum pada profile perusahaan dapat diisi dibawah ini :</label>
                        <div class="form-group row">
                            <p> <b>GAMBAR PERUSAHAAN</b></p>
                            <div class="col">
                                <label> Banner</label>
                                <img width="100%" src="{{ asset('storage/' . $data_pemberi_kerjas->url_banner) }}">
                                <input id="imgBanner" type="file" name="imgBanner" class="form-control"
                                    onchange="previewBanner(this)" accept="image/jpeg">
                                <img id="previewImgBanner" name="previewImgBanner"
                                    style="max-width:130px;margin-top:20px;" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <p> <b>PROFIL</b></p>
                            <div class="col-md-6">
                                <label>Nama Perusahaan</label>
                                <input input id="nama_perusahaan" type="text" class="form-control"
                                    value="{{ $data_pemberi_kerjas->nama_perusahaan }}" required>
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal berdiri</label>
                                <input input id="tanggal_berdiri" type="date" class="form-control"
                                    value="{{ $data_pemberi_kerjas->tgl_berdiri }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>CABANG</b></p>
                            <div class="col-md-6">
                                <label>Jumlah Cabang di Indonesia</label>
                                <input input id="jumlah_cabang_dalam_negeri" type="text" class="form-control"
                                    value="{{ $data_pemberi_kerjas->jumlah_cabang_dalam_negeri }}" required>
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Cabang di Luar Negeri</label>
                                <input input id="jumlah_cabang_luar_negeri" type="text" class="form-control"
                                    value="{{ $data_pemberi_kerjas->jumlah_cabang_dalam_negeri }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>ALAMAT</b></p>
                            <div class="col-md-6">
                                <label>Provinsi</label>
                                <select id="provinsi" class="form-control" name="provinsi"
                                    value="{{ $get_provinsi->id }}"
                                    data-value="{{ $get_provinsi->id }}" required="">
                                    @foreach ($provinsis as $pro)
                                        <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Kabupaten</label>
                                <select id="kabupaten" disabled class="form-control" name="kabupaten"
                                    value="{{ $get_kabupaten->id }}"
                                    data-value="{{ $get_kabupaten->id }}" required="">
                                    @foreach ($get_provinsi->regencies as $kab)
                                        <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Kecamatan</label>
                                <select id="kecamatan" disabled class="form-control" name="kecamatan"
                                    value="{{ $get_kecamatan->id }}"
                                    data-value="{{ $get_kecamatan->id }}" required="">
                                    @foreach ($get_provinsi->districts as $kec)
                                        <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Kelurahan</label>
                                <select id="kelurahan" disabled class="form-control" name="kelurahan"
                                    value="{{ $get_kelurahan->id }}"
                                    data-value="{{ $get_kelurahan->id }}" required="">
                                    @foreach ($get_provinsi->villages as $kel)
                                        <option value="{{ $kel->id }}">{{ $kel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Nama Jalan</label>
                            <div class="col-md-12">
                                <input input id="nama_jalan" type="text" class="form-control"
                                    value="{{ $data_pemberi_kerjas->nama_jalan }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>INFORMASI TAMBAHAN</b></p>
                            <div class="col-md-12">
                                <label>Jenis Industri</label>
                                <select id="id_jenis_industri" class="form-control" name="id_jenis_industri"
                                    value="{{ $data_pemberi_kerjas->jenis_industri->id }}"
                                    data-value="{{ $data_pemberi_kerjas->jenis_industri->id }}" required="">
                                    @foreach ($jenis_industris as $ji)
                                        <option value="{{ $ji->id }}">{{ $ji->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label>Email Perusahaan</label>
                                <input input id="email_perusahaan" type="text" class="form-control" required
                                    value="{{ $data_pemberi_kerjas->email_perusahaan }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Website Perusahaan</label>
                            <input input id="website_perusahaan" type="text" class="form-control" required
                                value="{{ $data_pemberi_kerjas->website_perusahaan }}">
                        </div>

                        <div class="form-group row">
                            <label>Tentang Perusahaan</label>
                            <input input id="tentang_perusahaan" type="text" class="form-control" vrequired
                                value="{{ $data_pemberi_kerjas->tentang_perusahaan }}">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="hapus-form-data-perusahaan" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" id="btn-add-data-perusahaan" class="btn btn-primary" data-type="edit"
                                    data-id="{{ $data_pemberi_kerjas->id }}">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if (!$legalitas_perusahaans)
                    <div class="card-body">
                        <h1><b> LEGALITAS PERUSAHAAN </b></h1>
                        <div class="form-group row">
                            <p> <b>Perizinan</b></p>
                            <div class="col-md-6">
                                <label>No. Perizinan</label>
                                <input input id="no_perizinan_perusahaan" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>No. TDP</label>
                                <input input id="no_tdp_perusahaan" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>No. Akta</label>
                                <input input id="no_akta_perusahaan" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label>NPWP</label>
                                <input input id="npwp_perusahaan" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Nama Pemilik</label>
                                <input input id="nama_pemilik" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>Pemilik</b></p>
                            <div class="col-md-12">
                                <label>Alamat Pemilik</label>
                                <input input id="alamat_pemilik" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>Pengurus</b></p>
                            <div class="col-md-12">
                                <label>Nama Pengurus</label>
                                <input input id="nama_pengurus" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Alamat Pengurus</label>
                                <input input id="alamat_pengurus" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="hapus-form-legalitas-perusahaan" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" id="btn-add-legalitas-perusahaan" class="btn btn-primary"
                                    data-type="add">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <h1><b> LEGALITAS PERUSAHAAN </b></h1>
                        <div class="form-group row">
                            <p> <b>Perizinan</b></p>
                            <div class="col-md-6">
                                <label>No. Perizinan</label>
                                <input input id="no_perizinan_perusahaan" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->no_perizinan }}">
                            </div>
                            <div class="col-md-6">
                                <label>No. TDP</label>
                                <input input id="no_tdp_perusahaan" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->no_tdp }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>No. Akta</label>
                                <input input id="no_akta_perusahaan" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->no_akta_perusahaan }}">
                            </div>
                            <div class="col-md-12">
                                <label>NPWP</label>
                                <input input id="npwp_perusahaan" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->npwp_perusahaan }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Nama Pemilik</label>
                                <input input id="nama_pemilik" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->nama_pemilik }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>Pemilik</b></p>
                            <div class="col-md-12">
                                <label>Alamat Pemilik</label>
                                <input input id="alamat_pemilik" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->alamat_pemilik }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <p> <b>Pengurus</b></p>
                            <div class="col-md-12">
                                <label>Nama Pengurus</label>
                                <input input id="nama_pengurus" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->nama_pengurus }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Alamat Pengurus</label>
                                <input input id="alamat_pengurus" type="text" class="form-control" required
                                    value="{{ $legalitas_perusahaans->alamat_pengurus }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="hapus-form-legalitas-perusahaan" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" id="btn-add-legalitas-perusahaan" class="btn btn-primary"
                                    data-type="edit" data-id="{{ $legalitas_perusahaans->id }}">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                @if (!$status_perusahaans)
                    <div class="card-body">
                        <h1><b> STATUS PERUSAHAAN </b></h1>
                        <div class="form-group row">
                            <p> <b>INFORMASI TAMBAHAN</b></p>
                            <div class="col-md-12">
                                <label>Status Kepemilikan</label>
                                <select id="id_status_kepemilikan" class="form-control" name="id_status_kepemilikan"
                                    required="">
                                    <option value="" disabled selected></option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Persero">Persero</option>
                                    <option value="Perum">Perum</option>
                                    <option value="Perusahaan Daerah">Perusahaan Daerah</option>
                                    <option value="Yayasan">Yayasan</option>
                                    <option value="Koperasi">Koperasi</option>
                                    <option value="Perseorangan">Perseorangan</option>
                                    <option value="Patungan">Patungan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Status Pemodal</label>
                                <select id="id_status_pemodal" class="form-control" name="id_status_pemodal" required="">
                                    <option value="" disabled selected></option>
                                    <option value="PMDN">PMDN</option>
                                    <option value="Swasta Nasional">Swasta Nasional</option>
                                    <option value="PMA">PMA</option>
                                    <option value="Joint Venture">Joint Venture</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Negara</label>
                            <div class="col-md-12">
                                <input input id="negara_status_perusahaan" name="negara_status_perusahaan" type="text"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="hapus-form-status-perusahaan" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" id="btn-add-status-perusahaan" class="btn btn-primary"
                                    data-type="add">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <h1><b> STATUS PERUSAHAAN </b></h1>
                        <div class="form-group row">
                            <p> <b>INFORMASI TAMBAHAN</b></p>
                            <div class="col-md-12">
                                <label>Status Kepemilikan</label>
                                <select id="id_status_kepemilikan" class="form-control" name="id_status_kepemilikan"
                                    required value="{{ $status_perusahaans->status_kepemilikan }}"
                                    data-value="{{ $status_perusahaans->status_kepemilikan }}">
                                    <option value="Swasta">Swasta</option>
                                    <option value="Persero">Persero</option>
                                    <option value="Perum">Perum</option>
                                    <option value="Perusahaan Daerah">Perusahaan Daerah</option>
                                    <option value="Yayasan">Yayasan</option>
                                    <option value="Koperasi">Koperasi</option>
                                    <option value="Perseorangan">Perseorangan</option>
                                    <option value="Patungan">Patungan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Status Pemodal</label>
                                <select id="id_status_pemodal" class="form-control" name="id_status_pemodal" required
                                    value="{{ $status_perusahaans->status_kepemilikan }}"
                                    data-value="{{ $status_perusahaans->status_pemodal }}">
                                    <option value="PMDN">PMDN</option>
                                    <option value="Swasta Nasional">Swasta Nasional</option>
                                    <option value="PMA">PMA</option>
                                    <option value="Joint Venture">Joint Venture</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Negara</label>
                            <div class="col-md-12">
                                <input input id="negara_status_perusahaan" name="negara_status_perusahaan" type="text"
                                    class="form-control" required value="{{ $status_perusahaans->negara }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="hapus-form-status-perusahaan" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" id="btn-add-status-perusahaan" class="btn btn-primary"
                                    data-type="edit" data-id="{{ $status_perusahaans->id }}">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            selectStatusCombobox("id_status_pemodal");
            selectStatusCombobox("id_status_kepemilikan");
            selectStatusCombobox("id_jenis_industri");
            selectStatusCombobox("provinsi");
            selectStatusCombobox("kabupaten");
            selectStatusCombobox("kecamatan");
            selectStatusCombobox("kelurahan");
            $("#btn-add-status-perusahaan").click(function() {
                var {
                    type,
                    id
                } = $(this).data();
                createOrUpdateStatusPerusahaan(type, id);
            });
            $("#btn-add-legalitas-perusahaan").click(function() {
                var {
                    type,
                    id
                } = $(this).data();
                createOrUpdateLegalitasPerusahaan(type, id);
            });
            $("#btn-add-data-perusahaan").click(function() {
                var {
                    type,
                    id
                } = $(this).data();
                createOrUpdateDataPerusahaan(type, id);
            });
            $("#hapus-form-status-perusahaan").click(function() {
                hapusStatusPerusahaanForm();
            });
            $("#hapus-form-legalitas-perusahaan").click(function() {
                hapusLegalitasPerusahaanForm();
            });
            // Select untuk modal profil pemberi kerja
            $('#provinsi').select2();
            $('#kabupaten').select2();
            $('#kecamatan').select2();
            $('#kelurahan').select2();
            $('#provinsi').change(function() {
                $.get('load_kabupaten_pemberi_kerja/' + $('#provinsi').val(),
                    function(data) {
                        $('#kabupaten').attr("disabled", false);
                        $('#kecamatan').attr("disabled", true);
                        $('#kelurahan').attr("disabled", true);
                        $('#kabupaten').html(`<option value=""></option>`);
                        $('#kecamatan').html(`<option value=""></option>`);
                        $('#kelurahan').html(`<option value=""></option>`);
                        data.forEach(kabupaten => {
                            $('#kabupaten').append(
                                `<option value="${kabupaten.id}">${kabupaten.name}</option>`
                            );
                        });
                    });
            });
            $('#kabupaten').change(function() {
                $.get('load_kecamatan_pemberi_kerja/' + $('#kabupaten').val(),
                    function(data) {
                        $('#kecamatan').attr("disabled", false);
                        $('#kelurahan').attr("disabled", true);
                        $('#kecamatan').html(`<option value=""></option>`);
                        $('#kelurahan').html(`<option value=""></option>`);
                        data.forEach(kecamatan => {
                            $('#kecamatan').append(
                                `<option value="${kecamatan.id}">${kecamatan.name}</option>`
                            );
                        });
                    });
            });
            $('#kecamatan').change(function() {
                $.get('load_kelurahan_pemberi_kerja/' + $('#kecamatan').val(),
                    function(data) {
                        $('#kelurahan').attr("disabled", false);
                        $('#kelurahan').html(`<option value=""></option>`);
                        data.forEach(kelurahan => {
                            $('#kelurahan').append(
                                `<option value="${kelurahan.id}">${kelurahan.name}</option>`
                            );
                        });
                    });
            });
            if ($('#provinsi').val()) {
                $('#kabupaten').attr("disabled", false);
            }
            if ($('#kabupaten').val()) {
                $('#kecamatan').attr("disabled", false);
            }
            if ($('#kecamatan').val()) {
                $('#kelurahan').attr("disabled", false);
            }
        });

        function selectStatusCombobox(id) {
            var status = $("#" + id).data("value");
            if (status) {
                $("#" + id + " option").each(function() {
                    var option = $(this);
                    if (option.val() == status) {
                        option.prop("selected", true);
                    }
                });
            }
        }

        function hapusStatusPerusahaanForm() {
            $("#id_status_pemodal").val("");
            $("#id_status_kepemilikan").val("");
            $("#negara_status_perusahaan").val("");
        }

        function hapusLegalitasPerusahaanForm() {
            $("#no_perizinan_perusahaan").val("");
            $("#no_tdp_perusahaan").val("");
            $("#no_akta_perusahaan").val("");
            $("#npwp_perusahaan").val("");
            $("#nama_pemilik").val("");
            $("#alamat_pemilik").val("");
            $("#nama_pengurus").val("");
            $("#alamat_pengurus").val("");
        }

        function createOrUpdateStatusPerusahaan(input, id = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: input == "add" ? "POST" : "PUT",
                url: input == "add" ? "/status_perusahaan" : "/status_perusahaan/" + id,
                data: {
                    id_status_kepemilikan: $("#id_status_kepemilikan").val(),
                    id_status_pemodal: $("#id_status_pemodal").val(),
                    id_status_kepemilikan: $("#id_status_kepemilikan").val(),
                    negara_status_perusahaan: $("#negara_status_perusahaan").val(),
                },
                success: function(data) {

                    alert('Status Perusahaan Berhasil Diubah');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function createOrUpdateLegalitasPerusahaan(input, id = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: input == "add" ? "POST" : "PUT",
                url: input == "add" ? "/legalitas_perusahaan" : "/legalitas_perusahaan/" + id,
                data: {
                    no_perizinan_perusahaan: $("#no_perizinan_perusahaan").val(),
                    no_tdp_perusahaan: $("#no_tdp_perusahaan").val(),
                    no_akta_perusahaan: $("#no_akta_perusahaan").val(),
                    npwp_perusahaan: $("#npwp_perusahaan").val(),
                    nama_pemilik: $("#nama_pemilik").val(),
                    alamat_pemilik: $("#alamat_pemilik").val(),
                    nama_pengurus: $("#nama_pengurus").val(),
                    alamat_pengurus: $("#alamat_pengurus").val(),
                },
                success: function(data) {

                    alert('Legalitas Perusahaan Berhasil Diubah');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function createOrUpdateDataPerusahaan(input, id = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // console.log($("#imgBanner")[0].files[0]);
            var formData = new FormData();
            formData.append("nama_perusahaan", $("#nama_perusahaan").val());
            formData.append("tanggal_berdiri", $("#tanggal_berdiri").val());
            formData.append("jumlah_cabang_dalam_negeri", $("#jumlah_cabang_dalam_negeri").val());
            formData.append("jumlah_cabang_luar_negeri", $("#jumlah_cabang_luar_negeri").val());
            formData.append("tentang_perusahaan", $("#tentang_perusahaan").val());
            formData.append("email_perusahaan", $("#email_perusahaan").val());
            formData.append("website_perusahaan", $("#website_perusahaan").val());
            formData.append("url_banner", $("#imgBanner")[0].files[0], $("#imgBanner")[0].files[0].name);
            formData.append("provinsi", $("#provinsi").val());
            formData.append("kabupaten", $("#kabupaten").val());
            formData.append("kecamatan", $("#kecamatan").val());
            formData.append("kelurahan", $("#kelurahan").val());
            formData.append("nama_jalan", $("#nama_jalan").val());
            formData.append("id_jenis_industri", $("#id_jenis_industri").val());
            $.ajax({
                type: "POST",
                url: input == "add" ? "/profil_pemberi_kerja" : "/profil_pemberi_kerja/" + id,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    alert('Data Perusahaan Berhasil Diubah');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function previewBanner(input) {
            var file = $("input[type=file]")[0].files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('.previewImgBanner').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
