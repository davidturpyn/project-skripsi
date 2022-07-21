<?php

namespace App\Http\Controllers\Pencari_Kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPencariKerja;
use App\Models\District;
use App\Models\Keahlian;
use App\Models\KeahlianPencariKerja;
use App\Models\MacamKeahlian;
use App\Models\Pendidikan;
use App\Models\PengalamanKerja;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Village;
use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as IlluminateValidationValidator;
use Throwable;

class ProfilPencariKerjaController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $macam_keahlian = MacamKeahlian::all();
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        $user = User::find(Auth::user()->id);

        if ($profil) {
            $pengalaman_kerja = PengalamanKerja::Where('nik', $profil->nik)->get();
            $pendidikan = Pendidikan::Where('nik', $profil->nik)->get();
            $sertifikat = Sertifikat::Where('nik', $profil->nik)->get();
            $keahlian_pencari_kerja = $profil->keahlian_pencari_kerjas()->get();
            // dd($keahlian_pencari_kerja);
            return view(
                'pencari_kerja.profil_pencari_kerja.profil_pencari_kerja',
                [
                    'users' => $user,
                    'profils' => $profil,
                    'provinsis' => $provinces,
                    'macam_keahlians' => $macam_keahlian,
                    'pengalaman_kerjas' => $pengalaman_kerja,
                    'pendidikans' => $pendidikan,
                    'sertifikats' => $sertifikat,
                    'keahlian_pencari_kerjas' => $keahlian_pencari_kerja,
                ]
            );
        }
        return view('pencari_kerja.profil_pencari_kerja.profil_pencari_kerja', [
            'provinsis' => $provinces,
            'users' => $user,
            'profils' => $profil,
            'macam_keahlians' => $macam_keahlian,
        ]);
    }

    public function store(Request $request)
    {
        $user = User::firstWhere('id', Auth::user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();

        $profil = DataPencariKerja::Create([
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'status' => $request->status_pernikahan,
            'deskripsi_profil' => $request->deskripsi_profile,
            'alamat_sesuai_ktp' => $request->alamat_ktp,
            'provinsi_id' => $request->provinsi,
            'kabupaten_id' => $request->kabupaten,
            'kecamatan_id' => $request->kecamatan,
            'kelurahan_id' => $request->kelurahan,
            'kode_pos_dom' => $request->kode_pos,
            'alamat_dom' => $request->alamat_dom,
            'status_bekerja' => $request->status_bekerja,
            'id_users' => Auth::user()->id,
        ]);
        return response()->json(['error' => false, 'profils' => $profil,], 200);
    }

    public function store_pengalaman_kerja(Request $request)
    {
        // request()->validate([
        //     'bukti_riwayat_pekerjaan'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
        // ]);
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        $file = $request->file('bukti_riwayat_pekerjaan');
        $nama_file = 'bukti' . date('Ymdhis') . '.' . $request->file('bukti_riwayat_pekerjaan')->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('documents', $file, $nama_file);
        $pengalaman_kerja = PengalamanKerja::Create([
            'pekerjaan' => $request->pekerjaan,
            'perusahaan' => $request->perusahaan,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'lokasi' => $request->lokasi,
            'dari_tanggal' => $request->dari_tanggal . "-" . 01,
            'sampai_tanggal' => $request->sampai_tanggal . "-" . 01,
            'deskripsi' => $request->deskripsi,
            'dokumen_riwayat_kerja' => $nama_file,
            'nik' => $profil->nik,
        ]);
        return response()->json(['error' => false, 'pengalaman_kerjas' => $pengalaman_kerja,], 200);
    }

    public function store_pendidikan(Request $request)
    {
        $file = $request->file('ijazah');
        $nama_file = 'bukti' . date('Ymdhis') . '.' . $request->file('ijazah')->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('documents', $file, $nama_file);
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        $pendidikan = Pendidikan::Create([
            'sekolah' => $request->sekolah,
            'bidang_studi' => $request->bidang_studi,
            'tingkat' => $request->tingkat,
            'nilai' => $request->nilai,
            'tahun_mulai' => $request->tahun_mulai . "-" . 01,
            'tahun_selesai' => $request->tahun_selesai . "-" . 01,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'aktivitas_dan_kegiatan_sosial' => $request->aktivitas_dan_kegiatan_sosial,
            'ijazah' => $nama_file,
            'nik' => $profil->nik,
        ]);
        return response()->json(['error' => false, 'pendidikans' => $pendidikan,], 200);
    }

    public function store_sertifikat(Request $request)
    {
        DB::beginTransaction();

        try {
            $file = $request->file('dokumen_sertifikat');
            $nama_file = 'bukti' . date('Ymdhis') . '.' . $request->file('dokumen_sertifikat')->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('documents', $file, $nama_file);
            $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
            $sertifikat = Sertifikat::create([
                'program_sertifikat' => $request->program_sertifikat,
                'lembaga_sertifikat' => $request->lembaga_sertifikat,
                'nilai' => $request->nilai,
                'tgl_diterbitkan' => $request->tgl_diterbitkan . "-" . 01,
                'tgl_berakhir' => $request->tgl_berakhir . "-" . 01,
                'dokumen' => $nama_file,
                'nik' => $profil->nik,

            ]);
            DB::commit();

            return response()->json(['error' => false, 'sertifikats' => $sertifikat,], 200);
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(['error' => true, 'sertifikats' => $sertifikat,], 200);
        }
    }

    public function update($nik, Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            $user = User::firstWhere('id', Auth::user()->id);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->save();

            $data = DataPencariKerja::firstWhere('nik', $nik);
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tgl_lahir = $request->tanggal_lahir;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->agama = $request->agama;
            $data->status = $request->status_pernikahan;
            $data->deskripsi_profil = $request->deskripsi_profile;
            $data->alamat_sesuai_ktp = $request->alamat_ktp;
            $data->provinsi_id = $request->provinsi;
            $data->kabupaten_id = $request->kabupaten;
            $data->kecamatan_id  = $request->kecamatan;
            $data->kelurahan_id = $request->kelurahan;
            $data->alamat_dom = $request->alamat_dom;
            $data->kode_pos_dom = $request->kode_pos;
            $data->status_bekerja = $request->status_bekerja;
            $data->id_users = Auth::user()->id;
            $data->save();

            DB::commit();

            return response()->json(
                [
                    'error' => false, 'profils' => $data,
                    'error' => false, 'users' => $user,
                ],
                200
            );
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(
                [
                    'error' => false, 'profils' => $data,
                    'error' => false, 'users' => $user,
                ],
                200
            );
        }
    }

    public function load_kabupaten($id)
    {
        $kabupaten = Regency::where('province_id', $id)->get();
        return $kabupaten;
    }
    public function load_kecamatan($id)
    {
        $kecamatan = District::where('regency_id', $id)->get();
        return $kecamatan;
    }
    public function load_kelurahan($id)
    {
        $kelurahan = Village::where('district_id', $id)->get();
        return $kelurahan;
    }

    public function update_pengalaman_kerja(Request $request, $id)
    {
        $file = $request->file('bukti_riwayat_pekerjaan');
        $nama_file = 'bukti' . date('Ymdhis') . '.' . $request->file('bukti_riwayat_pekerjaan')->getClientOriginalExtension();

        $pengalaman_kerja = PengalamanKerja::find($id);

        Storage::disk('public')->delete("documents/{$pengalaman_kerja->dokumen_riwayat_kerja}");

        $pengalaman_kerja->pekerjaan = $request->input('pekerjaan');
        $pengalaman_kerja->perusahaan = $request->input('perusahaan');
        $pengalaman_kerja->tipe_pekerjaan = $request->input('tipe_pekerjaan');
        $pengalaman_kerja->lokasi = $request->input('lokasi');
        $pengalaman_kerja->dari_tanggal = $request->input('dari_tanggal') . "-" . 01;
        $pengalaman_kerja->sampai_tanggal = $request->input('sampai_tanggal') . "-" . 01;
        $pengalaman_kerja->deskripsi = $request->input('deskripsi');
        $pengalaman_kerja->nik = Auth::user()->data_pencari_kerja->nik;
        $pengalaman_kerja->dokumen_riwayat_kerja = $nama_file;
        $pengalaman_kerja->save();

        Storage::disk('public')->putFileAs("documents", $file, $nama_file);

        return response()->json(['error' => false, 'pengalaman_kerjas' => $pengalaman_kerja,], 200);
    }

    public function update_pendidikan(Request $request, $id)
    {
        $file = $request->file('ijazah');
        $nama_file = 'bukti' . date('Ymdhis') . '.' . $request->file('ijazah')->getClientOriginalExtension();

        $pd = Pendidikan::find($id);

        Storage::disk('public')->delete("documents/{$pd->ijazah}");

        $pd->sekolah = $request->input('sekolah');
        $pd->bidang_studi = $request->input('bidang_studi');
        $pd->tingkat = $request->input('tingkat_pendidikan');
        $pd->nilai = $request->input('nilai');
        $pd->tahun_mulai = $request->input('tahun_mulai') . "-" . 01;
        $pd->tahun_selesai = $request->input('tahun_selesai') . "-" . 01;
        $pd->lokasi = $request->input('lokasi');
        $pd->deskripsi = $request->input('deskripsi_pendidikan');
        $pd->aktivitas_dan_kegiatan_sosial = $request->input('aktivitas_dan_kegiatan_sosial_pendidikan');
        $pd->nik = Auth::user()->data_pencari_kerja->nik;
        $pd->ijazah = $nama_file;
        $pd->save();

        Storage::disk('public')->putFileAs("documents", $file, $nama_file);

        return response()->json(['error' => false, 'pendidikans' => $pd,], 200);
    }

    public function update_sertifikat(Request $request, $id)
    {
        $file = $request->file('dokumen_sertifikat');
        $nama_file = 'bukti' . date('Ymdhis') . '.' . $request->file('dokumen_sertifikat')->getClientOriginalExtension();

        $st = Sertifikat::find($id);

        Storage::disk('public')->delete("documents/{$st->dokumen}");

        $st->program_sertifikat = $request->input('program_sertifikat');
        $st->lembaga_sertifikat = $request->input('lembaga_sertifikat');
        $st->nilai = $request->input('nilai');
        $st->tgl_diterbitkan = $request->input('tgl_diterbitkan') . "-" . 01;
        $st->tgl_berakhir = $request->input('tgl_berakhir') . "-" . 01;
        $st->nik = Auth::user()->data_pencari_kerja->nik;
        $st->dokumen = $nama_file;
        $st->save();

        Storage::disk('public')->putFileAs("documents", $file, $nama_file);

        return response()->json(['error' => false, 'sertifikats' => $st,], 200);
    }

    public function store_keahlian(Request $request)
    {
        // dd($request);
        $arraykeahlian = explode(',', $request->macam_keahlian);
        // dd($arraykeahlian);
        $keahlians = collect($arraykeahlian)->map(function ($keahlian) {
            return ['id_keahlian_pencari_kerja' => $keahlian];
        })->toArray();

        // dd($keahlians);
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        $keahlian_pencari_kerja = $profil
            ->keahlian_pencari_kerjas()->attach($keahlians);
        return response()->json(['error' => false, 'keahlian_pencari_kerjas' => $keahlian_pencari_kerja,], 200);
    }

    public function update_keahlian(Request $request)
    {
        // dd($request->all());
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        // delete data yang ada pada many to many 
        $profil->keahlian_pencari_kerjas()->detach();

        // dd($request);
        $arraykeahlian = explode(',', $request->macam_keahlian);
        // dd($arraykeahlian);
        $keahlians = collect($arraykeahlian)->map(function ($keahlian) {
            return ['id_keahlian_pencari_kerja' => $keahlian];
        })->toArray();

        // dd($keahlians);
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        $keahlian_pencari_kerja = $profil
            ->keahlian_pencari_kerjas()->attach($keahlians);
        return response()->json(['error' => false, 'keahlian_pencari_kerjas' => $keahlian_pencari_kerja,], 200);
    }

    public function show_pengalaman_kerja($id)
    {
        $pengalaman_kerja = PengalamanKerja::find($id);
        return response()->json(['error' => false, 'pengalaman_kerjas' => $pengalaman_kerja,], 200);
    }

    public function show_pendidikan($id)
    {
        $pendidikan = Pendidikan::find($id);
        return response()->json(['error' => false, 'pendidikans' => $pendidikan,], 200);
    }

    public function show_sertifikat($id)
    {
        $sertifikat = Sertifikat::find($id);
        return response()->json(['error' => false, 'sertifikats' => $sertifikat,], 200);
    }

    public function show_keahlian()
    {
        $profil = DataPencariKerja::firstWhere('id_users', Auth::user()->id);
        // dd($profil->nik);
        $keahlian = KeahlianPencariKerja::Where('nik_keahlian_pencari_kerja', $profil->nik)->get();
        // dd($keahlian);
        return response()->json(['error' => false, 'keahlians' => $keahlian,], 200);
    }

    public function destroy_pengalaman_kerja($id)
    {
        // dd($id);
        $pk = PengalamanKerja::destroy($id);
        return response()->json(['error' => false, 'pengalaman_kerjas' => $pk,], 200);
    }

    public function destroy_pendidikan($id)
    {
        $pd = Pendidikan::destroy($id);
        return response()->json(['error' => false, 'pendidikans' => $pd,], 200);
    }

    public function destroy_sertifikat($id)
    {
        $st = Sertifikat::destroy($id);
        return response()->json(['error' => false, 'sertifikats' => $st,], 200);
    }


    public function update_photo_profile(Request $request)
    {
        $file = $request->file('imgPhotoProfile');
        $nama_file = time() . '.' . $request->file('imgPhotoProfile')->getClientOriginalExtension();
        $user = User::firstWhere('id', Auth::user()->id);
        Storage::disk('public')->delete("public/{$user->url_foto_profile}");
        Storage::disk('local')->put("public/$nama_file", \file_get_contents($file));
        $user->url_foto_profile = $nama_file;
        $user->save();
        return response()->json(['error' => false, 'users' => $user,], 200);
    }
}
