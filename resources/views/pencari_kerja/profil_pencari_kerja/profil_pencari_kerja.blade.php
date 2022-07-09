@extends('layouts.pencari_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pencari_kerja') }}">Beranda</a></div>
            <div class="breadcrumb-item">Profil</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Halo, Kak {{ Auth::user()->firstname }}!</h2>
        <p class="section-lead">
            Ubah profil anda dan sesuaikan agar lebih menarik.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">

                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                @if (Auth::user()->url_foto_profile)
                                    <img alt="image" id="photo_profile"
                                        src="{{ asset('storage/' . Auth::user()->url_foto_profile) }}"
                                        class="mx-auto d-blok mw-100 mh-100 rounded-circle profile-widget-picture">
                                    <button class="btn btn-primary" id="OpenImgUpload">Edit Photo</button>
                                @endif
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Posts</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Followers</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Following</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-target="#biodata">
                        <a>
                            <h4>Klik saya, Untuk melihat informasi Biodata</h4>
                        </a>
                    </div>
                    <div id="biodata" class="collapse">
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ Auth::user()->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Web Developer
                                </div>
                            </div>
                            @if (!$profils)
                                <p>Deskrpsimu belum diisi, yuk diisi dulu diform sebelah!</p>
                            @else
                                {{ $profils->deskripsi_profil }}
                            @endif
                        </div>
                    </div>
                    @if (isset($profils))
                        {{-- Pengalaman --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    @if (count($pengalaman_kerjas) > 0)
                                        <h5 class="my-auto">Pengalaman</h5>
                                        <a onclick="event.preventDefault();addPengalamanKerjaForm();" href="#"
                                            class="btn btn-primary" data-bs-toggle="modal">
                                            Tambah Pengalaman
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($pengalaman_kerjas) > 0)
                                    @foreach ($pengalaman_kerjas as $pk)
                                        <div class="row my-4 border py-2">
                                            <div class="col-sm">
                                                <small>{{ $pk->perusahaan }}</small>
                                                <h5 class="mb-0">
                                                    {{ $pk->pekerjaan }}
                                                </h5>
                                                <small>{{ \Carbon\Carbon::parse($pk->dari_tanggal)->format('F Y') }} -
                                                    {{ \Carbon\Carbon::parse($pk->sampai_tanggal)->format('F Y') }} •
                                                    {{ $pk->tipe_pekerjaan }}</small>
                                                <div>
                                                    <span class="fas fa-map-marker"></span>
                                                    <small>{{ $pk->lokasi }}</small>
                                                </div>
                                                <div>
                                                    <small>{{ $pk->deskripsi }}</small>
                                                </div>
                                                <div>
                                                    <a
                                                        href="{{ asset('storage/documents/' . $pk->dokumen_riwayat_kerja) }}">
                                                        <button type="button"
                                                            class="btn btn-light">{{ $pk->dokumen_riwayat_kerja }}</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a onclick="event.preventDefault();editPengalamanKerjaForm({{ $pk->id }});"
                                                            href="#" class="dropdown-item" data-toggle="modal">
                                                            Ubah
                                                        </a>
                                                        <a onclick="event.preventDefault();hapusPengalamanKerja({{ $pk->id }});"
                                                            href="#" class="dropdown-item" data-toggle="modal">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <p> Silahkan lengkapi data pengalaman kerja kamu, data pengalaman kerja ini dapat
                                            membantu dalam memperbagus skor profil kamu. </p>
                                        <a onclick="event.preventDefault();addPengalamanKerjaForm();" href="#"
                                            class="btn btn-primary" data-toggle="modal">
                                            Tambah Pengalaman Kerja
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Pendidikan --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    @if (count($pendidikans) > 0)
                                        <h5 class="my-auto">Pendidikan</h5>
                                        <a onclick="event.preventDefault();addPendidikanForm();" href="#"
                                            class="btn btn-primary" data-toggle="modal">
                                            Tambah Pendidikan
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($pendidikans) > 0)
                                    @foreach ($pendidikans as $pd)
                                        <div class="row my-4 border py-2">
                                            <div class="col-sm">
                                                <small>{{ $pd->bidang_studi }}</small>
                                                <h5 class="mb-0">
                                                    {{ $pd->sekolah }}
                                                </h5>
                                                <small>{{ $pd->tahun_mulai }}-{{ $pd->tahun_selesai }} <i
                                                        class="fa fa-graduation-cap"></i> {{ $pd->nilai }}</small>
                                                <div>
                                                    <span class="fas fa-map-marker"></span>
                                                    <small>{{ $pd->lokasi }}</small>
                                                </div>
                                                <div>
                                                    <small>{{ $pd->deskripsi }}</small>
                                                </div>
                                                <div>
                                                    <small>{{ $pd->aktivitas_dan_kegiatan_sosial }}</small>
                                                </div>
                                                <div>
                                                    <a href="{{ asset('storage/documents/' . $pd->ijazah) }}">
                                                        <button type="button"
                                                            class="btn btn-light">{{ $pd->ijazah }}</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a onclick="event.preventDefault();editPendidikanForm({{ $pd->id }});"
                                                            href="#" class="dropdown-item" data-toggle="modal">
                                                            Ubah
                                                        </a>
                                                        <a onclick="event.preventDefault();hapusPendidikan({{ $pd->id }});"
                                                            href="#" class="dropdown-item" data-toggle="modal">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <p> Silahkan lengkapi data Pendidikan kamu, data pendidikan perlu sehingga
                                            kelengkapan
                                            profilmu. </p>
                                        <a onclick="event.preventDefault();addPendidikanForm();" href="#"
                                            class="btn btn-primary" data-toggle="modal">
                                            Tambah Pendidikan
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Sertifikat --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    @if (count($sertifikats) > 0)
                                        <h5 class="my-auto">Sertifikat</h5>
                                        <a onclick="event.preventDefault();addSertifikatForm();" href="#"
                                            class="btn btn-primary" data-toggle="modal">
                                            Tambah Sertifikat
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($sertifikats) > 0)
                                    @foreach ($sertifikats as $sf)
                                        <div class="row my-4 border py-2">
                                            <div class="col-sm">
                                                <small>{{ $sf->lembaga_sertifikat }}</small>
                                                <h5 class="mb-0">
                                                    {{ $sf->program_sertifikat }}
                                                </h5>
                                                <small>{{ \Carbon\Carbon::parse($sf->tgl_diterbitkan)->format('F Y') }} -
                                                    {{ \Carbon\Carbon::parse($sf->tgl_berakhir)->format('F Y') }} <i
                                                        class="fa fa-graduation-cap"></i>
                                                    {{ $sf->nilai }}</small>
                                                <div>
                                                    <a href="{{ asset('storage/documents/' . $sf->dokumen) }}">
                                                        <button type="button"
                                                            class="btn btn-light">{{ $sf->dokumen }}</button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a onclick="event.preventDefault();editSertifikatForm({{ $sf->id }});"
                                                            href="#" class="dropdown-item" data-toggle="modal">
                                                            Ubah
                                                        </a>
                                                        <a onclick="event.preventDefault();hapusSertifikat({{ $sf->id }});"
                                                            href="#" class="dropdown-item" data-toggle="modal">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <p> Silahkan lengkapi data sertifikasi kamu, data sertifikasi ini akan membuat
                                            profilmu
                                            lebih
                                            menarik. </p>
                                        <a onclick="event.preventDefault();addSertifikatForm();" href="#"
                                            class="btn btn-primary" data-toggle="modal">
                                            Tambah Sertifikat
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Keahlian --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    @if (count($profils->keahlian_pencari_kerjas) > 0)
                                        <h5 class="my-auto">Keahlian</h5>
                                        <a onclick="event.preventDefault();addKeahlianForm();" href="#"
                                            class="btn btn-primary" data-toggle="modal">
                                            Tambah Keahlian
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @if (count($profils->keahlian_pencari_kerjas) > 0)
                                <div class="row m-auto p-auto my-2 border py-2 d-flex">
                                    @foreach ($profil->$keahlian_pencari_kerjas as $k)
                                        <div class="mb-0 p-2">
                                            <small class="badge badge-pill badge-info">{{ $k->nama }}
                                            </small>
                                        </div>
                                    @endforeach
                                    <div class="mb-0 ml-auto p-2 btn-group">
                                        <a onclick="event.preventDefault();editKeahlianForm();" href="#"
                                            class="btn" data-toggle="modal">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="text-center">
                                    <p> Silahkan lengkapi data keahlian kamu, lengkapi keahlian-keahlian yang kamu punya
                                        agar
                                        profilmu banyak diminati. </p>
                                    <a onclick="event.preventDefault();addKeahlianForm();" href="#"
                                        class="btn btn-primary" data-toggle="modal">
                                        Tambah Keahlian
                                    </a>
                                </div>
                            @endif
                        </div>
                    @else
                        {{-- Pendidikan --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    <h5 class="my-auto">Pengalaman</h5>
                                    <a onclick="event.preventDefault();addPengalamanKerjaForm();" href="#"
                                        class="btn btn-primary" data-toggle="modal">
                                        Tambah Pengalaman
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="w-100 d-flex justify-content-between">
                                    Silahkan lengkapi data pengalaman kerja kamu, data pengalaman kerja ini dapat
                                    membantu dalam memperbagus skor profil kamu.
                                </p>
                            </div>
                        </div>
                        {{-- Pendidikan --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    <h5 class="my-auto">Pendidikan</h5>
                                    <a onclick="event.preventDefault();addPendidikanForm();" href="#"
                                        class="btn btn-primary" data-toggle="modal">
                                        Tambah Pendidikan
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="w-100 d-flex justify-content-between">
                                    Silahkan lengkapi data Pendidikan kamu, data pendidikan perlu sehingga kelengkapan
                                    profilmu.
                                </p>
                            </div>
                        </div>
                        {{-- Sertifikat --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    <h5 class="my-auto">Sertifikat</h5>
                                    <a onclick="event.preventDefault();addSertifikatForm();" href="#"
                                        class="btn btn-primary" data-toggle="modal">
                                        Tambah Sertifikat
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="w-100 d-flex justify-content-between">
                                    Silahkan lengkapi data sertifikasi kamu, data sertifikasi ini akan membuat profilmu
                                    lebih
                                    menarik.
                                </p>
                            </div>
                        </div>
                        {{-- Keahlian --}}
                        <div class="card shadow bg-body rounded">
                            <div class="card-header">
                                <div class="w-100 d-flex justify-content-between">
                                    <h5 class="my-auto">Keahlian</h5>
                                    <a onclick="event.preventDefault();addKeahlianForm();" href="#"
                                        class="btn btn-primary" data-toggle="modal">
                                        Tambah Keahlian
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="w-100 d-flex justify-content-between">
                                    Silahkan lengkapi data keahlian kamu, lengkapi keahlian-keahlian yang kamu punya agar
                                    profilmu banyak diminati.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    @if (!$profils)
                        <form method="post" id="form-data-pencari-kerja"
                            action="{{ route('profil_pencari_kerja.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Depan</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control"
                                            value="{{ Auth::user()->firstname }}" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Belakang</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control"
                                            value="{{ Auth::user()->lastname }}" required="">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Nomor Induk Kependudukan</label>
                                        <input type="text" id="nik" name="nik" class="form-control"
                                            value="" required="" maxlength="16">
                                        <div class="invalid-feedback">
                                            Masukkan Nomor Induk Kependudukan Anda
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                            value="" required="">
                                        <div class="invalid-feedback">
                                            Masukkan Tempat Lahir Anda
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                            class="form-control" value="" required="">
                                        <div class="invalid-feedback">
                                            Masukkan Tanggal Lahir Anda
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Jenis Kelamin</label>
                                        <select id="jenis_kelamin" class="form-control" name="jenis_kelamin"
                                            required="">
                                            <option value=""></option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Agama</label>
                                        <select id="agama" class="form-control" name="agama" required="">
                                            <option value=""></option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status</label>
                                        <select id="status_pernikahan" class="form-control" name="status_pernikahan"
                                            required="">
                                            <option value=""></option>
                                            <option value="Lajang">Lajang</option>
                                            <option value="Telah Menikah">Telah Menikah</option>
                                            <option value="Duda">Duda</option>
                                            <option value="Janda">Janda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status Bekerja</label>
                                        <select id="status_bekerja" class="form-control" name="status_bekerja"
                                            required="">
                                            <option value=""></option>
                                            <option value="Belum Bekerja">Belum Bekerja</option>
                                            <option value="Sudah Bekerja">Sudah Bekerja</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Deskripsi Anda</label>
                                        <textarea type="text" id="deskripsi_profile" name="deskripsi_profile" class="form-control" value=""
                                            required=""></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Alamat Sesuai KTP</label>
                                        <textarea type="text" id="alamat_ktp" name="alamat_ktp" class="form-control" value="" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Domisili</label>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Provinsi</label>
                                            <select id="provinsi" class="form-control" name="provinsi" required="">
                                                <option value=""></option>
                                                @foreach ($provinsis as $pro)
                                                    <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kabupaten</label>
                                            <select id="kabupaten" disabled class="form-control" name="kabupaten"
                                                required="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kecamatan</label>
                                            <select id="kecamatan" disabled class="form-control" name="kecamatan"
                                                required="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kelurahan</label>
                                            <select id="kelurahan" disabled class="form-control" name="kelurahan"
                                                required="">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Alamat</label>
                                            <textarea type="text" id="alamat_dom" name="alamat_dom" class="form-control" value="" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kode Pos</label>
                                            <input type="number" id="kode_pos" name="kode_pos" class="form-control"
                                                value="" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-primary" id="add_data_pencari_kerja">Simpan
                                    Perubahan</button>
                            </div>
                        </form>
                    @else
                        <form method="post" id="form-data-pencari-kerja-update"
                            action="{{ route('profil_pencari_kerja.update', ['nik' => $profils->nik]) }}">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Depan</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control"
                                            value="{{ Auth::user()->firstname }}" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Belakang</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control"
                                            value="{{ Auth::user()->lastname }}" required="">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Nomor Induk Kependudukan</label>
                                        <input type="text" id="nik" name="nik" class="form-control"
                                            value="{{ $profils->nik }}" required="" maxlength="16" disabled>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                            value="{{ $profils->tempat_lahir }}" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                            class="form-control" value="{{ $profils->tgl_lahir }}" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Jenis Kelamin</label>
                                        <select id="jenis_kelamin" class="form-control" name="jenis_kelamin"
                                            required="" value="{{ $profils->jenis_kelamin }}"
                                            data-value="{{ $profils->jenis_kelamin }}">
                                            {{-- <option value="{{ $profils->jenis_kelamin }}">{{ $profils->jenis_kelamin }}</option> --}}
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Agama</label>
                                        <select id="agama" class="form-control" name="agama" required=""
                                            value="{{ $profils->agama }}" data-value="{{ $profils->agama }}">
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status</label>
                                        <select id="status_pernikahan" class="form-control" name="status_pernikahan"
                                            required="" value="{{ $profils->status }}"
                                            data-value="{{ $profils->status }}">
                                            <option value="Lajang">Lajang</option>
                                            <option value="Telah Menikah">Telah Menikah</option>
                                            <option value="Duda">Duda</option>
                                            <option value="Janda">Janda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Status Bekerja</label>
                                        <select id="status_bekerja" class="form-control" name="status_bekerja"
                                            required="" value="{{ $profils->status_bekerja }}"
                                            data-value="{{ $profils->status_bekerja }}">
                                            <option value="Belum Bekerja">Belum Bekerja</option>
                                            <option value="Sudah Bekerja">Sudah Bekerja</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Deskripsi Anda</label>
                                        <textarea type="text" id="deskripsi_profile" name="deskripsi_profile" class="form-control" value=""
                                            required="">{{ $profils->deskripsi_profil }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Alamat Sesuai KTP</label>
                                        <textarea type="text" id="alamat_ktp" name="alamat_ktp" class="form-control" value="" required="">{{ $profils->alamat_sesuai_ktp }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Domisili</label>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Provinsi</label>
                                            <select id="provinsi" class="form-control" name="provinsi" required=""
                                                value="{{ $profils->provinsi_id }}"
                                                data-value="{{ $profils->provinsi_id }}">
                                                @foreach ($provinsis as $pro)
                                                    <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kabupaten</label>
                                            <select id="kabupaten" disabled class="form-control" name="kabupaten"
                                                required="" value="{{ $profils->kabupaten_id }}"
                                                data-value="{{ $profils->kabupaten_id }}">
                                                @foreach ($profils->provinsi->regencies as $kab)
                                                    <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kecamatan</label>
                                            <select id="kecamatan" disabled class="form-control" name="kecamatan"
                                                required="" value="{{ $profils->kecamatan_id }}"
                                                data-value="{{ $profils->kecamatan_id }}">
                                                @foreach ($profils->provinsi->districts as $kec)
                                                    <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kelurahan</label>
                                            <select id="kelurahan" disabled class="form-control" name="kelurahan"
                                                required="" value="{{ $profils->kelurahan_id }}"
                                                data-value="{{ $profils->kelurahan_id }}">
                                                @foreach ($profils->provinsi->villages as $kel)
                                                    <option value="{{ $kel->id }}">{{ $kel->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Alamat</label>
                                            <textarea type="text" id="alamat_dom" name="alamat_dom" class="form-control" value="" required="">{{ $profils->alamat_dom }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kode Pos</label>
                                            <input type="number" id="kode_pos" name="kode_pos" class="form-control"
                                                value="{{ $profils->kode_pos_dom }}" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-primary" id="update_data_pencari_kerja">Simpan
                                    Perubahan</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('pencari_kerja.profil_pencari_kerja.profil_modal.pengalaman_kerja.pengalaman_kerja_add')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.pengalaman_kerja.pengalaman_kerja_edit')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.pengalaman_kerja.pengalaman_kerja_delete')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.pendidikan.pendidikan_add')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.pendidikan.pendidikan_edit')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.pendidikan.pendidikan_delete')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.sertifikat.sertifikat_add')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.sertifikat.sertifikat_edit')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.sertifikat.sertifikat_delete')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.keahlian.keahlian_add')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.keahlian.keahlian_edit')
    @include('pencari_kerja.profil_pencari_kerja.profil_modal.upload_photo_profile.upload_photo_profile');
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#OpenImgUpload').click(function(e) {
                $("#edit-error-bag").hide();
                $('#editPhotoProfile').appendTo('body').modal('show'); 
            });
            selectStatusCombobox("provinsi");
            selectStatusCombobox("kabupaten");
            selectStatusCombobox("kecamatan");
            selectStatusCombobox("kelurahan");
            selectStatusCombobox("status_bekerja");
            selectStatusCombobox("status_pernikahan");
            selectStatusCombobox("jeis_kelamin");
            selectStatusCombobox("agama");
            $('#macam_keahlian').select2({
                placeholder: "Please Select"
            });
            $('#macam_keahlian_edit').select2({
                placeholder: "Please Select"
            });
            $('#provinsi').select2();
            $('#kabupaten').select2();
            $('#kecamatan').select2();
            $('#kelurahan').select2();
            $('#provinsi').change(function() {
                $.get('load_kabupaten/' + $('#provinsi').val(),
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
                $.get('load_kecamatan/' + $('#kabupaten').val(),
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
                $.get('load_kelurahan/' + $('#kecamatan').val(),
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
            $('#bekerja_saat_ini').on('click', function() {
                if ($('#bekerja_saat_ini').is(':checked')) {
                    $('#sampai_tanggal').attr("disabled", true);
                } else {
                    $('#sampai_tanggal').removeAttr("disabled");
                }
            });
            $("#add_data_pencari_kerja").click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("firstname", $("#form-data-pencari-kerja input[name=firstname]").val());
                formData.append("lastname", $("#form-data-pencari-kerja input[name=lastname]").val());
                formData.append("nik", $("#form-data-pencari-kerja input[name=nik]").val());
                formData.append("tempat_lahir", $("#form-data-pencari-kerja input[name=tempat_lahir]")
                    .val());
                formData.append("tanggal_lahir", $("#form-data-pencari-kerja input[name=tanggal_lahir]")
                    .val());
                formData.append("jenis_kelamin", $("#jenis_kelamin")
                    .val());
                formData.append("agama", $("#agama").val());
                formData.append("status_pernikahan", $(
                    "#status_pernikahan").val());
                formData.append("deskripsi_profile", $(
                    "#deskripsi_profile").val());
                formData.append("alamat_ktp", $("#alamat_ktp").val());
                formData.append("provinsi", $("#provinsi").val());
                formData.append("kabupaten", $("#kabupaten").val());
                formData.append("kecamatan", $("#kecamatan").val());
                formData.append("kelurahan", $("#kelurahan").val());
                formData.append("kode_pos", $("#form-data-pencari-kerja input[name=kode_pos]").val());
                formData.append("alamat_dom", $("#alamat_dom").val());
                formData.append("status_bekerja", $("#status_bekerja")
                    .val());
                $.ajax({
                    type: 'POST',
                    url: "{{ route('profil_pencari_kerja.store') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Biodatamu berhasil disimpan!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        Swal.fire('Aduh, ada yang salah', 'OK!', 'error');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    }
                });
            });
            @if (isset($profils))
                $("#update_data_pencari_kerja").click(function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var formData = new FormData();
                    formData.append("firstname", $("#form-data-pencari-kerja-update input[name=firstname]")
                        .val());
                    formData.append("lastname", $("#form-data-pencari-kerja-update input[name=lastname]")
                        .val());
                    formData.append("nik", $("#form-data-pencari-kerja-update input[name=nik]").val());
                    formData.append("tempat_lahir", $(
                        "#form-data-pencari-kerja-update input[name=tempat_lahir]").val());
                    formData.append("tanggal_lahir", $(
                        "#form-data-pencari-kerja-update input[name=tanggal_lahir]").val());
                    formData.append("jenis_kelamin", $("#jenis_kelamin").val());
                    formData.append("agama", $("#agama").val());
                    formData.append("status_pernikahan", $("#status_pernikahan").val());
                    formData.append("deskripsi_profile", $("#deskripsi_profile").val());
                    formData.append("alamat_ktp", $("#alamat_ktp").val());
                    formData.append("provinsi", $("#provinsi").val());
                    formData.append("kabupaten", $("#kabupaten").val());
                    formData.append("kecamatan", $("#kecamatan").val());
                    formData.append("kelurahan", $("#kelurahan").val());
                    formData.append("kode_pos", $("#form-data-pencari-kerja-update input[name=kode_pos]")
                        .val());
                    formData.append("alamat_dom", $("#alamat_dom").val());
                    formData.append("status_bekerja", $("#status_bekerja").val());
                    var dataForm = Object.fromEntries(formData.entries())
                    console.log(dataForm)
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('profil_pencari_kerja.update', ['nik' => $profils->nik]) }}",
                        data: dataForm,
                        cache: false,
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire('Yeay, Biodatamu berhasil diubah!', 'OK!', 'success');
                            setTimeout(function() {
                                location.href =
                                    "{{ route('profil_pencari_kerja.index') }}";
                            }, 2000);

                        },
                        error: function(data) {
                            Swal.fire('Aduh, ada yang salah', 'OK!', 'error');
                            setTimeout(function() {
                                location.href =
                                    "{{ route('profil_pencari_kerja.index') }}";
                            }, 2000);
                        }
                    });
                });
            @endif
            $("#btn-add-pengalaman-kerja").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("pekerjaan", $("#frmAddPengalamanKerja input[name=pekerjaan]").val());
                formData.append("perusahaan", $("#frmAddPengalamanKerja input[name=perusahaan]").val());
                formData.append("tipe_pekerjaan", $("#tipe_pekerjaan").val());
                formData.append("lokasi", $("#frmAddPengalamanKerja input[name=lokasi]").val());
                formData.append("dari_tanggal", $("#frmAddPengalamanKerja input[name=dari_tanggal]").val());
                formData.append("sampai_tanggal", $("#frmAddPengalamanKerja input[name=sampai_tanggal]")
                    .val());
                formData.append("deskripsi", $("#deskripsi_pengalaman").val());
                formData.append("bukti_riwayat_pekerjaan", $("#bukti_riwayat_pekerjaan")[0].files[0], $(
                    "#bukti_riwayat_pekerjaan")[0].files[0].name);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('pengalaman_kerja.store') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Pengalaman kerja berhasil ditambahkan!', 'OK!',
                            'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-pengalaman-kerja-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-pengalaman-kerja-errors').append('<li>' +
                                value + '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            });
            $("#btn-add-pendidikan").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("sekolah", $("#frmAddPendidikan input[name=sekolah]").val());
                formData.append("bidang_studi", $("#frmAddPendidikan input[name=bidang_studi]").val());
                formData.append("tingkat", $("#tingkat").val());
                formData.append("nilai", $("#frmAddPendidikan input[name=nilai]").val());
                formData.append("tahun_mulai", $("#frmAddPendidikan input[name=tahun_mulai]").val());
                formData.append("tahun_selesai", $("#frmAddPendidikan input[name=tahun_selesai]")
                    .val());
                formData.append("lokasi", $("#frmAddPendidikan input[name=lokasi]").val());
                formData.append("deskripsi", $("#deskripsi").val());
                formData.append("aktivitas_dan_kegiatan_sosial", $("#aktivitas_dan_kegiatan_sosial").val());
                formData.append("ijazah", $("#ijazah")[0].files[0], $(
                    "#ijazah")[0].files[0].name);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('pendidikan.store') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Pendidikan berhasil ditambahkan!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-pendidikan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-pendidikan-errors').append('<li>' +
                                value + '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            });
            $("#btn-add-sertifikat").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("program_sertifikat", $("#frmAddSertifikat input[name=program_sertifikat]")
                    .val());
                formData.append("lembaga_sertifikat", $("#frmAddSertifikat input[name=lembaga_sertifikat]")
                    .val());
                formData.append("nilai", $("#frmAddSertifikat input[name=nilai]").val());
                formData.append("tgl_diterbitkan", $("#frmAddSertifikat input[name=tgl_diterbitkan]")
                    .val());
                formData.append("tgl_berakhir", $("#frmAddSertifikat input[name=tgl_berakhir]")
                    .val());
                formData.append("dokumen_sertifikat", $("#dokumen_sertifikat")[0].files[0], $(
                    "#dokumen_sertifikat")[0].files[0].name);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('sertifikat.store') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Sertifikatmu berhasil ditambahkan!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-pendidikan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-pendidikan-errors').append('<li>' +
                                value + '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            });
            $('#btn-add-keahlian').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("macam_keahlian", $("#macam_keahlian")
                    .val());
                $.ajax({
                    type: 'POST',
                    url: "{{ route('keahlian.store') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, keahlianmu berhasil ditambahkan!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-keahlian-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-keahlian-errors').append('<li>' +
                                value + '</li>');
                        });
                        $("#add-error-bag").show();
                    }
                });
            });
            $("#btn-edit-pengalaman-kerja").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("pekerjaan", $("#frmEditPendidikan input[name=pekerjaan]").val());
                formData.append("perusahaan", $("#frmEditPengalamanKerja input[name=perusahaan]").val());
                formData.append("tipe_pekerjaan", $("#frmEditPengalamanKerja #tipe_pekerjaan").val());
                formData.append("lokasi", $("#frmEditPengalamanKerja input[name=lokasi]").val());
                formData.append("dari_tanggal", $("#frmEditPengalamanKerja input[name=dari_tanggal]")
                    .val());
                formData.append("sampai_tanggal", $("#frmEditPengalamanKerja input[name=sampai_tanggal]")
                    .val());
                formData.append("deskripsi", $("#deskripsi_pengalaman").val());
                formData.append("bukti_riwayat_pekerjaan", $(
                    "#frmEditPengalamanKerja #bukti_riwayat_pekerjaan")[0].files[0], $(
                    "#frmEditPengalamanKerja #bukti_riwayat_pekerjaan")[0].files[0].name);
                $.ajax({
                    type: 'POST',
                    url: '/pengalaman_kerja/' + $(
                        "#frmEditPengalamanKerja input[name=id_pengalaman]").val() + '/update/',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Pengalaman kerja berhasil diubah!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-pengalaman-kerja-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-pengalaman-kerja-errors').append('<li>' + value +
                                '</li>');
                        });
                        $("#edit-error-bag").show();
                    }
                });
            });
            $("#btn-edit-pendidikan").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("sekolah", $("#frmEditPendidikan input[name=sekolah]").val());
                formData.append("bidang_studi", $("#frmEditPendidikan input[name=bidang_studi]").val());
                formData.append("tingkat_pendidikan", $("#frmEditPendidikan #tingkat_pendidikan").val());
                formData.append("nilai", $("#frmEditPendidikan input[name=nilai]").val());
                formData.append("tahun_mulai", $("#frmEditPendidikan input[name=tahun_mulai]")
                    .val());
                formData.append("tahun_selesai", $("#frmEditPendidikan input[name=tahun_selesai]")
                    .val());
                formData.append("lokasi", $("#frmEditPendidikan input[name=lokasi]").val());
                formData.append("deskripsi_pendidikan", $("#deskripsi_pendidikan").val());
                formData.append("aktivitas_dan_kegiatan_sosial_pendidikan", $(
                    "#aktivitas_dan_kegiatan_sosial_pendidikan").val());
                formData.append("ijazah", $(
                    "#frmEditPendidikan #ijazah")[0].files[0], $(
                    "#frmEditPendidikan #ijazah")[0].files[0].name);
                $.ajax({
                    type: 'POST',
                    url: '/pendidikan/' + $(
                        "#frmEditPendidikan input[name=id_pendidikan]").val() + '/update/',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Pendidikan berhasil diubah!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-pendidikan-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-pendidikan-errors').append('<li>' + value +
                                '</li>');
                        });
                        $("#edit-error-bag").show();
                    }
                });
            });
            $("#btn-edit-sertifikat").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("program_sertifikat", $("#frmEditSertifikat input[name=program_sertifikat]")
                    .val());
                formData.append("lembaga_sertifikat", $("#frmEditSertifikat input[name=lembaga_sertifikat]")
                    .val());
                formData.append("nilai", $("#frmEditSertifikat input[name=nilai]").val());
                formData.append("tgl_diterbitkan", $("#frmEditSertifikat input[name=tgl_diterbitkan]")
                    .val());
                formData.append("tgl_berakhir", $("#frmEditSertifikat input[name=tgl_berakhir]")
                    .val());
                formData.append("dokumen_sertifikat", $(
                    "#frmEditSertifikat #dokumen_sertifikat")[0].files[0], $(
                    "#frmEditSertifikat #dokumen_sertifikat")[0].files[0].name);
                $.ajax({
                    type: 'POST',
                    url: '/sertifikat/' + $(
                        "#frmEditSertifikat input[name=id_sertifikat]").val() + '/update/',
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Sertifikat berhasil diubah!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#edit-sertifikat-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#edit-sertifikat-errors').append('<li>' + value +
                                '</li>');
                        });
                        $("#edit-error-bag").show();
                    }
                });
            });
            $("#btn-delete-pengalaman-kerja").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'DELETE',
                    url: '/pengalaman_kerja/' + $(
                            "#frmDeletePengalamanKerja input[name=id_pengalaman]").val() +
                        '/delete/',
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yah, pengalaman kerjamu sudah terhapus!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            $("#btn-delete-pendidikan").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'DELETE',
                    url: '/pendidikan/' + $(
                            "#frmDeletePendidikan input[name=id_pendidikan]").val() +
                        '/delete/',
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('yah, pendidikanmu sudah dihapus!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            $("#btn-delete-sertifikat").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'DELETE',
                    url: '/sertifikat/' + $(
                            "#frmDeleteSertifikat input[name=id_sertifikat]").val() +
                        '/delete/',
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yah, sertifikatmu sudah terhapus!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            $('#btn-edit-photo-profile').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData();
                formData.append("imgPhotoProfile", $(
                    "#frmUpdatePhotoProfile #imgPhotoProfile")[0].files[0], $(
                    "#frmUpdatePhotoProfile #imgPhotoProfile")[0].files[0].name);
                    $.ajax({
                    type: 'POST',
                    url: "{{ route('photo_profile.update') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire('Yeay, Foto Profile berhasil diubah!', 'OK!', 'success');
                        setTimeout(function() {
                            location.href =
                                "{{ route('profil_pencari_kerja.index') }}";
                        }, 2000);
                    },
                    error: function(data) {
                        x
                    }
                });
            });
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

        function addPengalamanKerjaForm() {
            @if ($profils)
                $(document).ready(function() {
                    $("#add-error-bag").hide();
                    $('#addPengalamanKerjaModal').appendTo('body').modal('show');
                });
            @else
                Swal.fire('Biodata pada formulir harus diisi dahulu ya kak!', 'OK!', 'info');
            @endif

        }

        function addPendidikanForm() {
            @if ($profils)
                $(document).ready(function() {
                    $("#add-error-bag").hide();
                    $('#addPendidikanModal').appendTo('body').modal('show');
                });
            @else
                Swal.fire('Biodata pada formulir harus diisi dahulu ya kak!', 'OK!', 'info');
            @endif
        }

        function addSertifikatForm() {
            @if ($profils)
                $(document).ready(function() {
                    $("#add-error-bag").hide();
                    $('#addSertifikatModal').appendTo('body').modal('show');
                });
            @else
                Swal.fire('Biodata pada formulir harus diisi dahulu ya kak!', 'OK!', 'info');
            @endif
        }

        function addKeahlianForm() {
            @if ($profils)
                $(document).ready(function() {
                    $("#add-error-bag").hide();
                    $('#addKeahlianModal').appendTo('body').modal('show');
                });
            @else
                Swal.fire('Biodata pada formulir harus diisi dahulu ya kak!', 'OK!', 'info');
            @endif
        }

        function editPengalamanKerjaForm(id_pengalaman) {
            $.ajax({
                type: 'GET',
                url: 'pengalaman_kerja/' + id_pengalaman + '/show/',
                success: function(data) {
                    var sampai_tanggal = new Date(data.pengalaman_kerjas.sampai_tanggal);
                    var dari_tanggal = new Date(data.pengalaman_kerjas.dari_tanggal);
                    var sampai_month = sampai_tanggal.getMonth() + 1;
                    var sampai_year = sampai_tanggal.getFullYear();
                    var dari_month = dari_tanggal.getMonth() + 1;
                    var dari_year = dari_tanggal.getFullYear();
                    var sampai_month_temp = sampai_month > 9 ? sampai_month : `0${sampai_month}`;
                    var dari_month_temp = dari_month > 9 ? dari_month : `0${dari_month}`;
                    $("#edit-error-bag").hide();
                    $("#frmEditPengalamanKerja #upload_bukti_riwayat_pekerjaan").hide();
                    $("#frmEditPengalamanKerja #btn_dokumen_riwayat_kerja").show();
                    $("#frmEditPengalamanKerja input[name=pekerjaan]").val(data.pengalaman_kerjas.pekerjaan);
                    $("#frmEditPengalamanKerja input[name=perusahaan]").val(data.pengalaman_kerjas.perusahaan);
                    $("#tipe_pekerjaan_pengalaman").val(data.pengalaman_kerjas.tipe_pekerjaan);
                    $("#frmEditPengalamanKerja input[name=lokasi]").val(data.pengalaman_kerjas.lokasi);
                    $("#frmEditPengalamanKerja input[name=dari_tanggal]").val(dari_year.toString() + "-" +
                        dari_month_temp);
                    $("#frmEditPengalamanKerja input[name=sampai_tanggal]").val(sampai_year.toString() + "-" +
                        sampai_month_temp);
                    $("#deskripsi_pengalaman_kerja").val(data.pengalaman_kerjas.deskripsi);
                    $("#frmEditPengalamanKerja input[name=id_pengalaman]").val(data.pengalaman_kerjas.id);
                    $('#editPengalamanKerjaModal').appendTo('body').modal('show');
                    $("#frmEditPengalamanKerja #btn_dokumen_riwayat_kerja").text(data.pengalaman_kerjas
                        .dokumen_riwayat_kerja);
                    $("#frmEditPengalamanKerja #btn_dokumen_riwayat_kerja_download").attr('href',
                        `storage/documents/${data.pengalaman_kerjas.dokumen_riwayat_kerja}`);

                    $("#frmEditPengalamanKerja #btn_dokumen_riwayat_kerja_edit").click(function() {
                        $("#frmEditPengalamanKerja #upload_bukti_riwayat_pekerjaan").show();
                        $("#frmEditPengalamanKerja #btn_dokumen_riwayat_kerja").hide();
                    });

                    $('#frmEditPengalamanKerja #bukti_riwayat_pekerjaan').on('change', function() {
                        //get the file name
                        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                        $('#frmEditPengalamanKerja .custom-file-label').html(fileName);
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function editPendidikanForm(id_pendidikan) {
            $.ajax({
                type: 'GET',
                url: 'pendidikan/' + id_pendidikan + '/show/',
                success: function(data) {
                    var tahun_mulai = new Date(data.pendidikans.tahun_mulai);
                    var tahun_akhir = new Date(data.pendidikans.tahun_selesai);
                    var tahun_mulai_month = tahun_mulai.getMonth() + 1;
                    var tahun_mulai_year = tahun_mulai.getFullYear();
                    var tahun_akhir_month = tahun_akhir.getMonth() + 1;
                    var tahun_akhir_year = tahun_akhir.getFullYear();
                    var tahun_mulai_temp = tahun_mulai_month > 9 ? tahun_mulai_month : `0${tahun_mulai_month}`;
                    var tahun_akhir_temp = tahun_akhir_month > 9 ? tahun_akhir_month : `0${tahun_akhir_month}`;
                    $("#edit-error-bag").hide();
                    $('#editPendidikanModal').appendTo('body').modal('show');
                    $("#frmEditPendidikan #upload_ijazah").hide();
                    $("#frmEditPendidikan #btn_ijazah   ").show();
                    $("#frmEditPendidikan input[name=sekolah]").val(data.pendidikans.sekolah);
                    $("#frmEditPendidikan input[name=bidang_studi]").val(data.pendidikans.bidang_studi);
                    $("#tingkat_pendidikan").val(data.pendidikans.tingkat);
                    $("#frmEditPendidikan input[name=tahun_mulai]").val(tahun_mulai_year.toString() + "-" +
                        tahun_mulai_temp);
                    $("#frmEditPendidikan input[name=tahun_selesai]").val(tahun_akhir_year.toString() + "-" +
                        tahun_akhir_temp);
                    $("#frmEditPendidikan input[name=nilai]").val(data.pendidikans.nilai);
                    $("#frmEditPendidikan input[name=lokasi]").val(data.pendidikans.lokasi);
                    $("#deskripsi_pendidikan").val(data.pendidikans.deskripsi);
                    $("#aktivitas_dan_kegiatan_sosial_pendidikan").val(data.pendidikans
                        .aktivitas_dan_kegiatan_sosial);
                    $("#frmEditPendidikan input[name=id_pendidikan]").val(data.pendidikans.id);
                    $("#frmEditPendidikan #btn_ijazah").text(data.pendidikans
                        .ijazah);
                    $("#frmEditPendidikan #btn_ijazah_download").attr('href',
                        `storage/documents/${data.pendidikans.ijazah}`);

                    $("#frmEditPendidikan #btn_ijazah_edit").click(function() {
                        $("#frmEditPendidikan #upload_ijazah").show();
                        $("#frmEditPendidikan #btn_ijazah").hide();
                    });

                    $('#frmEditPendidikan #ijazah').on('change', function() {
                        //get the file name
                        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                        $('#frmEditPendidikan .custom-file-label').html(fileName);
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function editSertifikatForm(id_sertifikat) {
            $.ajax({
                type: 'GET',
                url: 'sertifikat/' + id_sertifikat + '/show/',
                success: function(data) {
                    var tgl_terbit = new Date(data.sertifikats.tgl_diterbitkan);
                    var tgl_akhir = new Date(data.sertifikats.tgl_berakhir);
                    var tgl_terbit_month = tgl_terbit.getMonth() + 1;
                    var tgl_terbit_year = tgl_terbit.getFullYear();
                    var tgl_akhir_month = tgl_akhir.getMonth() + 1;
                    var tgl_akhir_year = tgl_akhir.getFullYear();
                    var tgl_terbit_temp = tgl_terbit_month > 9 ? tgl_terbit_month : `0${tgl_terbit_month}`;
                    var tgl_akhir_temp = tgl_akhir_month > 9 ? tgl_akhir_month : `0${tgl_akhir_month}`;
                    $("#edit-error-bag").hide();
                    $('#editSertifikatModal').appendTo('body').modal('show');
                    $("#frmEditSertifikat #upload_dokumen_sertifikat").hide();
                    $("#frmEditSertifikat #btn_dokumen_sertifikat").show();
                    $("#frmEditSertifikat input[name=program_sertifikat]").val(data.sertifikats
                        .program_sertifikat);
                    $("#frmEditSertifikat input[name=lembaga_sertifikat]").val(data.sertifikats
                        .lembaga_sertifikat);
                    $("#frmEditSertifikat input[name=tgl_diterbitkan]").val(tgl_terbit_year.toString() + "-" +
                        tgl_terbit_temp);
                    $("#frmEditSertifikat input[name=tgl_berakhir]").val(tgl_akhir_year.toString() + "-" +
                        tgl_akhir_temp);
                    $("#frmEditSertifikat input[name=nilai]").val(data.sertifikats.nilai);
                    $("#frmEditSertifikat input[name=id_sertifikat]").val(data.sertifikats.id);
                    $("#frmEditSertifikat #btn_dokumen_sertifikat").text(data.sertifikats
                        .dokumen);
                    $("#frmEditSertifikat #btn_dokumen_sertifikat_download").attr('href',
                        `storage/documents/${data.sertifikats.dokumen}`);

                    $("#frmEditSertifikat #btn_dokumen_sertifikat_edit").click(function() {
                        $("#frmEditSertifikat #upload_dokumen_sertifikat").show();
                        $("#frmEditSertifikat #btn_dokumen_sertifikat").hide();
                    });

                    $('#frmEditSertifikat #dokumen_sertifikat').on('change', function() {
                        //get the file name
                        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                        $('#frmEditSertifikat .custom-file-label').html(fileName);
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function editKeahlianForm() {
            $.ajax({
                type: 'GET',
                url: 'keahlian/show',
                success: function(data) {
                    $("#add-error-bag").hide();
                    $('#editKeahlianModal').appendTo('body').modal('show');
                    $('#editKeahlianModalContent').html('');
                    $('#editKeahlianModalContent').html(JSON.stringify(data));
                    $("#btn-edit-keahlian").click(function(e) {
                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var formData = new FormData();
                        formData.append("macam_keahlian", $("#macam_keahlian_edit")
                            .val());
                        $.ajax({
                            type: 'POST',
                            url: 'keahlian/update',
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            success: function(data) {
                                Swal.fire('Yeay, Keahlianmu berhasil diubah!', 'OK!',
                                    'success');
                                setTimeout(function() {
                                    location.href =
                                        "{{ route('profil_pencari_kerja.index') }}";
                                }, 2000);
                            },
                            error: function(data) {
                                var errors = $.parseJSON(data.responseText);
                                $('#edit-keahlian-errors').html('');
                                $.each(errors.messages, function(key, value) {
                                    $('#edit-keahlian-errors').append('<li>' +
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

        function hapusPengalamanKerja(id_pengalaman) {
            $.ajax({
                type: 'GET',
                url: 'pengalaman_kerja/' + id_pengalaman + '/show',
                success: function(data) {
                    $("#frmDeletePengalamanKerja #delete-title").html("Delete (" + data.pengalaman_kerjas
                        .pekerjaan + ")?");
                    $("#frmDeletePengalamanKerja input[name=id_pengalaman]").val(data.pengalaman_kerjas.id);
                    $('#deletePengalamanKerjaModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function hapusPendidikan(id_pendidikan) {
            $.ajax({
                type: 'GET',
                url: 'pendidikan/' + id_pendidikan + '/show',
                success: function(data) {
                    $("#frmDeletePendidikan #delete-title").html("Delete (" + data.pendidikans
                        .sekolah + ")?");
                    $("#frmDeletePendidikan input[name=id_pendidikan]").val(data.pendidikans.id);
                    $('#deletePendidikanModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function hapusSertifikat(id_sertifikat) {
            $.ajax({
                type: 'GET',
                url: 'sertifikat/' + id_sertifikat + '/show',
                success: function(data) {
                    $("#frmDeleteSertifikat #delete-title").html("Delete (" + data.sertifikats
                        .program_sertifikat + ")?");
                    $("#frmDeleteSertifikat input[name=id_sertifikat]").val(data.sertifikats.id);
                    $('#deleteSertifikatModal').appendTo('body').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
@endsection
