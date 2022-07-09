<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            box-sizing: border-box;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        html {
            font-family: "Lucida Sans", sans-serif;
        }

        .header {
            text-align: center;
            padding: 15px;
        }

        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu li {
            padding: 8px;
            margin-bottom: 7px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .judul {
            font-weight: bold;
        }

        .kotak {
            border-style: groove;
            border-radius: 5px;
        }
        }

    </style>
    <title>Document</title>
</head>

<body>
    <div class="header">
        <h1>Bentuk Laporan</h1>
        <p style="font-size:12px;">Sebagaimana dimaksud pada Pasal 6 ayat (2) Undang-undang 7 tahun 1981</p>
        <p style="font-size:12px;">tentang Wajib Lapor Ketenagakerjaan di Perusahaan</p>
    </div>

    <div class="row">
        <div class=" menu">
            <ul>
                <li class="judul">A. KEADAAN PERUSAHAAN</li>
                <div class="kotak">
                    <div style="font-size:14px">
                        <ul>
                            <li>1. Kode Pendaftaran : {{ $pelaporans->id }}</li>
                            <li>2. Nama Perusahaan : {{ $data_pemberi_kerjas->nama_perusahaan }}</li>
                            <li>3. Alamat Perusahaan : {{ $data_pemberi_kerjas->nama_jalan }}</li>
                            <li>4. No Tlp/Fax : {{ $users->telepon }}</li>
                        </ul>
                    </div>
                </div><br>
                <div class="kotak">
                    <div style="font-size:14px">
                        <ul>
                            <li>1. Jenis Usaha : {{ $data_pemberi_kerjas->jenis_industri->nama }}</li>
                            <li>2. Jumlah Cabang Dalam/Luar Negeri :
                                {{ $data_pemberi_kerjas->jumlah_cabang_dalam_negeri }} dan
                                {{ $data_pemberi_kerjas->jumlah_cabang_luar_negeri }}</li>
                        </ul>
                    </div>
                </div><br>
                <li class="judul">B. LEGALITAS PERUSAHAAN</li>
                <div class="kotak">
                    <div style="font-size:14px">
                        <ul>
                            <li>1. Nama Pemilik Perusahaan : {{ $legalitas->nama_pemilik }}</li>
                            <li>2. Alamat Pemilik Perusahaan : {{ $legalitas->alamat_pemilik }}</li>
                        </ul>
                    </div>
                </div><br>
                <div class="kotak">
                    <div style="font-size:14px">
                        <ul>
                            <li>1. Tanggal Beridir Perusahaan : {{ $data_pemberi_kerjas->tgl_berdiri }}</li>
                            <li>2. Nomor Akte Perusahaan : {{ $legalitas->no_akta_perusahaan }}</li>
                        </ul>
                    </div>
                </div><br>
                <li class="judul">C. STATUS PERUSAHAAN</li>
                <div class="kotak">
                    <div style="font-size:14px">
                        <ul>
                            <li>1. Status Kepemilikan : {{ $status_perusahaans->status_kepemilikan }}</li>
                            <li>2. Status Pemodal : {{ $status_perusahaans->status_pemodal }}</li>
                            <li>3. Negara Perusahaan : {{ $status_perusahaans->negara }}</li>
                        </ul>
                    </div>
                </div><br>
                <li class="judul">D. TANGGAL BERLAPOR DAN KEWAJIBAN BERLAPOR KEMBALI</li>
                <div class="kotak">
                    <div style="font-size:14px">
                        <ul>
                            <li>1. Nomor Pelaporan : {{ $pelaporans->id }}</li>
                            <li>2. Tanggal Berlapor : {{ $pelaporans->tgl_berlapor }}</li>
                            <li>3. Kewajiban Lapor Kembali : {{ $pelaporans->tgl_berlaku }}</li>
                        </ul>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</body>

</html>
