@extends('layouts.pemberi_kerja.master')

@section('title', 'Kotawaringin Barat')

@section('content')
    <div class="section-header">
        <h1>Edit Lowongan Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard_pemberi_kerja') }}">Beranda Perusahaan</a>
            </div>
            <div class="breadcrumb-item active"><a href="/lowongan_kerja">Lowongan Kerja</a></div>
            <div class="breadcrumb-item active"><a
                    href="{{ route('lowongan_kerja.show', ['id' => $lowongan_kerjas->id]) }}">Ubah Lowongan Kerja</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="card-body" id="form-lowongan-1"
                action="{{ route('lowongan_kerja.update', ['id' => $lowongan_kerjas->id]) }}" method="POST">
                @csrf
                <h1><b> Informasi Lowongan </b></h1>
                <div class="form-group row g-3">
                    <p> <b>Ikuti langkah - langkah berikut untuk mempublish lowongan.</b></p>
                    <div class="col-md-12">
                        <label>Judul Pekerjaan</label>
                        <input input id="judul" name="judul_pekerjaan" type="text" class="form-control" required
                            placeholder="Admin" value="{{ $lowongan_kerjas->judul_pekerjaan }}">
                    </div>
                </div>

                <div class="form-group row g-3">
                    <div class="col-md-12">
                        <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea style="width: 100%px; height: 150px;" rows="3" cols="40" class="form-control" name="deskripsi_pekerjaan"
                            id="deskripsi" required>{{ $lowongan_kerjas->deskripsi_pekerjaan }}</textarea>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <div class="col-md-12">
                        <label>Jabatan</label>
                        <select id="id_jabatan" class="form-control" name="id_jabatan"
                            value="{{ $lowongan_kerjas->jabatan->id }}" data-value="{{ $lowongan_kerjas->jabatan->id }}"
                            required>
                            @foreach ($jabatans as $j)
                                <option value="{{ $j->id }}">{{ $j->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Alamat</b></p>
                    <div class="col-md-6">
                        <label>Provinsi</label>
                        <select id="provinsi" class="form-control" value="{{ $get_provinsi->id }}"
                            data-value="{{ $get_provinsi->id }}" name="provinsi_id" required>
                            @foreach ($provinsis as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Kabupaten</label>
                        <select id="kabupaten" disabled class="form-control"
                            value="{{ $get_kabupaten->id }}"
                            data-value="{{ $get_kabupaten->id }}" name="kabupaten_id" required>
                            @foreach ($get_provinsi->regencies as $kab)
                                <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <div class="col-md-6">
                        <label>Kecamatan</label>
                        <select id="kecamatan" disabled class="form-control" name="kecamatan_id"
                            value="{{ $get_kecamatan->id }}"
                            data-value="{{ $get_kecamatan->id }}" required="">
                            @foreach ($get_provinsi->districts as $kec)
                                <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Kelurahan</label>
                        <select id="kelurahan" disabled class="form-control" name="kelurahan_id"
                            value="{{ $get_kelurahan->id }}"
                            data-value="{{ $get_kelurahan->id }}" name="kabupaten_id" required>
                            @foreach ($get_provinsi->villages as $kel)
                                <option value="{{ $kel->id }}">{{ $kel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <label>Nama Jalan</label>
                    <div class="col-md-12">
                        <input input id="nama_jalan" name="nama_jalan" type="text" class="form-control"
                            value="{{ $lowongan_kerjas->nama_jalan }}" required placeholder="Jalan ... ">
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Detail Pekerjaan</b></p>
                    <div class="col-md-6">
                        <label>Jenis Pekerjaan</label>
                        <select id="jenis_pekerjaan" class="form-control" name="jenis_pekerjaan" required
                            value="{{ $lowongan_kerjas->jenis_pekerjaan }}">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Intership">Intership</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Bidang Pekerjaan</label>
                        <select id="id_bidang_pekerjaan" class="form-control" name="id_bidang_pekerjaan"
                            value="{{ $lowongan_kerjas->id_bidang_pekerjaan }}"
                            data-value="{{ $lowongan_kerjas->id_bidang_pekerjaan }}" required="">
                            @foreach ($bidang_pekerjaans as $bp)
                                <option value="{{ $bp->id }}">{{ $bp->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Jenis Industri</label>
                        <select id="jenis_industri" class="form-control" name="id_jenis_industri"
                            value="{{ $lowongan_kerjas->id_jenis_industri }}"
                            data-value="{{ $lowongan_kerjas->id_jenis_industri }}" required="">
                            @foreach ($jenis_industris as $ji)
                                <option value="{{ $ji->id }}">{{ $ji->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Disabilitas</b></p>
                    <div class="form-check col-md-2">
                        <input class="form-check-input" type="checkbox" id="disabilitas"
                            @if ($lowongan_kerjas->is_disabilitas == '1') checked @endif name="is_disabilitas" value="1">
                        <label class="form-check-label" for="disabilitas">
                            Disabilitas
                        </label>
                    </div>
                    <div class="form-check col-md-2">
                        <input class="form-check-input" type="checkbox" id="nondisabilitas" name="is_non_disabilitas"
                            @if ($lowongan_kerjas->is_non_disabilitas == '1') checked @endif value="1" checked>
                        <label class="form-check-label" for="nondisabilitas">
                            Non Disabilitas
                        </label>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <div class="col-md-12" style="display: none" id="input_disabilitas_multiple">
                        <label>Pilih jenis disabilitas yang <b>tidak diperbolehkan</b> untuk melamar.</label>
                        <select id="disabilitas_tidak_boleh" class="form-control" name="disabilitas_tidak_boleh[]"
                            multiple="multiple">
                            @foreach ($macam_disabilitas as $md)
                                @if (in_array($md->id, array_column($lowongan_kerjas->disabilitas->toArray(), 'id')))
                                    <option value="{{ $md->id }}" selected>{{ $md->nama }}</option>
                                @else
                                    <option value="{{ $md->id }}">{{ $md->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Jenis Kelamin</b></p>
                    <div class="form-check col-md-2">
                        <input class="form-check-input" type="checkbox" id="cbxlaki_laki" name="is_laki_laki" value="1"
                            @if ($lowongan_kerjas->is_laki_laki == '1') checked @endif>
                        <label class="form-check-label" for="flexCheckChecked">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check col-md-2">
                        <input class="form-check-input" type="checkbox" id="cbxperempuan" name="is_perempuan" value="1"
                            @if ($lowongan_kerjas->is_perempuan == '1') checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Rentang Gaji</b></p>
                    <div class="col-md-6">
                        <input input id="rentang_gaji_awal" name="rentang_gaji_awal" type="text" class="form-control"
                            value="{{ $lowongan_kerjas->rentang_gaji_awal }}" required placeholder="Rp. 1.000.000">
                    </div>
                    <div class="col-md-6">
                        <input input id="rentang_gaji_akhir" name="rentang_gaji_akhir" type="text" class="form-control"
                            value="{{ $lowongan_kerjas->rentang_gaji_akhir }}" required placeholder="Rp. 4.000.000">
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Tanggal Tayang</b></p>
                    <div class="col-md-12">
                        <input input id="tanggal_tayang" name="tanggal_tayang" type="date" class="form-control" required
                            value="{{ $lowongan_kerjas->tanggal_tayang->format('Y-m-d') }}">
                    </div><br>
                </div>

                <div class="form-group row g-3">
                    <div class="col-md-10">
                        <b><label for="">Tanggal Expired Lowongan</label></b>
                        <input input id="tanggal_expired" name="tanggal_expired" type="date" class="form-control"
                            value="{{ $lowongan_kerjas->tanggal_expired->format('Y-m-d') }}" required>
                    </div>
                    <div class="col-md-2">
                        <b><label for="">Kuota</label></b>
                        <input input id="kuota" name="kuota" type="number" class="form-control"
                            value="{{ $lowongan_kerjas->kuota }}" required placeholder="10">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-3 offset-md-9">
                        <button type="submit" id="btn_next_1" class="btn btn-primary" data-type="selanjutnya_lowongan_2"
                            data-id="">
                            {{ __('Selanjutnya') }}
                        </button>
                    </div>
                </div>
            </form>
            <form class="card-body" id="form-lowongan-2"
                action="{{ route('lowongan_kerja.update', ['id' => $lowongan_kerjas->id]) }}" method="POST">
                @csrf
                <h1><b> Persyaratan Umum & Khusus </b></h1>
                <p> <b>Ikuti langkah - langkah berikut untuk mempublish lowongan.</b></p>
                <div class="form-group row g-3">
                    <label style="font-size: 20px;font-weight: bold;">Persyaratan Umum</label>
                    <div class="col-md-6">
                        <label for="">Minimal Pendidikan</label>
                        <select name="minimal_pendidikan" id="minimal_pendidikan" class="form-control"
                            value="{{ $lowongan_kerjas->minimal_pendidikan }}" required>>
                            <option value="SMP atau Sederajat">SMP atau Sederajat</option>
                            <option value="SMA atau Sederajat">SMA atau Sederajat</option>
                            <option value="SMK">SMK</option>
                            <option value="Profesi">Profesi</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Sarjana">Sarjana</option>
                            <option value="Magister">Magister</option>
                            <option value="Doktoral">Doktoral</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Pengalaman Dibutuhkan</label>
                        <select name="minimal_pengalaman_bekerja" id="minimal_pengalaman" class="form-control"
                            value="{{ $lowongan_kerjas->minimal_pengalaman_bekerja }}" required>
                            <option value="Freshgraduate">Freshgraduate</option>
                            <option value="Kurang Dari 1 Tahun">Kurang Dari 1 Tahun</option>
                            <option value="1 Sampai 4 Tahun">1 sampai 4 Tahun</option>
                            <option value="4 Sampai 7 Tahun">4 Sampai 7 Tahun</option>
                            <option value="7 Sampai 10 Tahun">7 Sampai 10 Tahun</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row g-3">
                    <p> <b>Status Pernikahan</b></p>
                    <div class="form-check col-md-2">
                        <input class="form-check-input" type="checkbox" value="1" id="cbxsingle" name="is_belum_menikah"
                            @if ($lowongan_kerjas->is_belum_menikah == '1') checked @endif>
                        <label class="form-check-label" for="flexCheckChecked">
                            Single / Belum Menikah
                        </label>
                    </div>
                    <div class="form-check col-md-2">
                        <input class="form-check-input" type="checkbox" value="1" id="cbxsudah_menikah"
                            name="is_sudah_menikah" @if ($lowongan_kerjas->is_sudah_menikah == '1') checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            Sudah Menikah
                        </label>
                    </div>
                </div>
                <div class="form-group row g-3">
                    <p> <b>Rentang Usia</b></p>
                    <div class="col-md-6">
                        <input name="minimal_usia" type="number" class="form-control"
                            value="{{ $lowongan_kerjas->minimal_usia }}" required placeholder="Minimal Usia">
                    </div>
                    <div class="col-md-6">
                        <input name="maksimal_usia" type="number" class="form-control"
                            value="{{ $lowongan_kerjas->maksimal_usia }}" required placeholder="Maksimal Usia">
                    </div>
                </div>
                <div class="form-group row g-3">
                    <label for="kualifikasi" class="form-label" style="font-size: 20px;font-weight: bold;">Persyaratan
                        Khusus</label>
                    <div class="col-md-12">
                        <label for="kualifikasi" class="form-label">Kualifikasi / Requirements</label>
                        <textarea class="form-control" id="kualifikasi" name="persyaratan_khusus" style="width: 100%px; height: 150px;"
                            rows="3" cols="40" required value=""
                            placeholder="Kualifikasi Lebih Detail">{{ $lowongan_kerjas->persyaratan_khusus }}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-3 offset-md-9">
                        <button type="button" id="btn_back_2" class="btn btn-primary" data-type="balik_lowongan_1"
                            data-id="">
                            {{ __('Sebelumnya') }}
                        </button>
                        <button type="submit" id="btn_next_2" class="btn btn-primary" data-type="selanjutnya_lowongan_3"
                            data-id="">
                            {{ __('Selanjutnya') }}
                        </button>
                    </div>
                </div>
            </form>
            <form class="card-body" id="form-lowongan-3"
                action="{{ route('lowongan_kerja.update', ['id' => $lowongan_kerjas->id]) }}" method="POST">
                @csrf
                <h1><b> Keterampilan </b></h1>
                <div class="form-group row g-3">
                    <p> <b>Ikuti langkah - langkah berikut untuk mempublish lowongan.</b></p>
                    <div class="col-md-12">
                        <label>Cari keahlian</label>
                        <select class="responsive" name="macam_keahlian[]" id="macam_keahlian" multiple="multiple">
                            @foreach ($macam_keahlians as $mk)
                                @if (in_array($mk->id, array_column($lowongan_kerjas->keahlians->toArray(), 'id')))
                                    <option value="{{ $mk->id }}" selected>{{ $mk->nama }}</option>
                                @else
                                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-3 offset-md-9">
                        <button type="button" id="btn_back_3" class="btn btn-primary" data-type="balik_lowongan_2">
                            {{ __('Sebelumnya') }}
                        </button>
                        <button type="submit" id="btn_next_3" class="btn btn-primary" data-type="selanjutnya_lowongan_4"
                            data-id="">
                            {{ __('Selanjutnya') }}
                        </button>
                    </div>
                </div>
            </form>
            <form class="card-body" id="form-lowongan-4"
                action="{{ route('lowongan_kerja.update', ['id' => $lowongan_kerjas->id]) }}" method="POST">
                @csrf
                <h1><b> Kontak </b></h1>
                <div class="form-group row g-3">
                    <p> <b>Ikuti langkah - langkah berikut untuk mempublish lowongan.</b></p>
                    <div class="col-md-12">
                        <label>Kontak</label>
                        <input name='kontaks' value='{{ $lowongan_kerjas->kontaks->implode('nama', ',') }}' class="responsive js-states form-control">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-3 offset-md-9">
                        <button type="button" id="btn_back_4" class="btn btn-primary" data-type="balik_lowongan_3"
                            data-id="">
                            {{ __('Sebelumnya') }}
                        </button>
                        <button type="submit" id="btn_simpan_lowongan" class="btn btn-primary" data-type="simpan"
                            data-id="">
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </div>
            </form>
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
            var rentang_gaji_awal_rupiah = document.getElementById('rentang_gaji_awal');
            var rentang_gaji_akhir_rupiah = document.getElementById('rentang_gaji_akhir');
            var kontak = document.querySelector('input[name=kontaks]');
            new Tagify(kontak);
            $('#form-lowongan-1').show();
            $('#form-lowongan-2').hide();
            $('#form-lowongan-3').hide();
            $('#form-lowongan-4').hide();
            buttonMultipleStep();
            selectStatusCombobox("id_jabatan");
            selectStatusCombobox("id_bidang_pekerjaan");
            selectStatusCombobox("provinsi");
            selectStatusCombobox("kabupaten");
            selectStatusCombobox("kecamatan");
            selectStatusCombobox("kelurahan");
            $('#provinsi').select2();
            $('#kabupaten').select2();
            $('#kecamatan').select2();
            $('#kelurahan').select2();
            $('#disabilitas_tidak_boleh').select2({
                placeholder: "Please Select"
            });
            $('#macam_keahlian').select2({
                placeholder: "Please Select"
            });

            $('#provinsi').change(function() {
                $.get('/load_kabupaten_lowongan/' + $('#provinsi').val(),
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
                $.get('/load_kecamatan_lowongan/' + $('#kabupaten').val(),
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
                $.get('/load_kelurahan_lowongan/' + $('#kecamatan').val(),
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
            rentang_gaji_awal_rupiah.addEventListener('keyup', function(e) {
                rentang_gaji_awal_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });
            rentang_gaji_akhir_rupiah.addEventListener('keyup', function(e) {
                rentang_gaji_akhir_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });
            var tgl_sekarang = new Date();
            var yyyy = tgl_sekarang.getFullYear();
            var mm = tgl_sekarang.getMonth() + 1
            var dd = tgl_sekarang.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            var today = yyyy + '-' + mm + '-' + dd;
            $('#tanggal_tayang_checked').on('click', function() {
                if ($('#tanggal_tayang_checked').is(':checked')) {
                    $('#tanggal_tayang').val(today);
                    $('#tanggal_tayang').prop('readonly', true);
                } else {
                    $('#tanggal_tayang').prop('readonly', false);
                }
            });
            $('#input_disabilitas_multiple').css('display', 'block');
            $('#disabilitas').on('click', function() {
                if ($('#disabilitas').is(':checked')) {
                    $('#input_disabilitas_multiple').css('display', 'block');
                } else {
                    $('#input_disabilitas_multiple').css('display', 'none');
                }
            });

        });

        function buttonMultipleStep() {
            $('#form-lowongan-1').on('submit', function(e) {
                e.preventDefault();
                $('#form-lowongan-1').hide();
                $('#form-lowongan-2').show();
                $('#form-lowongan-3').hide();
                $('#form-lowongan-4').hide();
            });
            $('#btn_back_2').on('click', function(e) {
                e.preventDefault();
                $('#form-lowongan-1').show();
                $('#form-lowongan-2').hide();
                $('#form-lowongan-3').hide();
                $('#form-lowongan-4').hide();
            });
            $('#form-lowongan-2').on('submit', function(e) {
                e.preventDefault();
                $('#form-lowongan-1').hide();
                $('#form-lowongan-2').hide();
                $('#form-lowongan-3').show();
                $('#form-lowongan-4').hide();
            });
            $('#btn_back_3').on('click', function(e) {
                e.preventDefault();
                $('#form-lowongan-1').hide();
                $('#form-lowongan-2').show();
                $('#form-lowongan-3').hide();
                $('#form-lowongan-4').hide();
            });
            $('#form-lowongan-3').on('submit', function(e) {
                e.preventDefault();
                $('#form-lowongan-1').hide();
                $('#form-lowongan-2').hide();
                $('#form-lowongan-3').hide();
                $('#form-lowongan-4').show();
            });
            $('#btn_back_4').on('click', function(e) {
                e.preventDefault();
                $('#form-lowongan-1').hide();
                $('#form-lowongan-2').hide();
                $('#form-lowongan-3').show();
                $('#form-lowongan-4').hide();
            });
            $('#form-lowongan-4').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('lowongan_kerja.update', ['id' => $lowongan_kerjas->id]) }}",
                    data: $('#form-lowongan-1, #form-lowongan-2, #form-lowongan-3, #form-lowongan-4')
                        .serialize(),
                    dataType: 'json',
                    success: function(data) {
                        swal.fire("Yeay!", "Lowongan Kerja Berhasil Diubah", "success");
                        setTimeout(function(){
                                location.href = "{{ route('lowongan_kerja.index') }}";
                            },2000);
                    },
                    error: function(data) {
                        Swal.fire(data, 'Aduh!',
                        'error');
                    }
                });
            })

        }

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

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

@endsection
