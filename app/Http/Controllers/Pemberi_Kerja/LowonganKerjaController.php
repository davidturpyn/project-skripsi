<?php

namespace App\Http\Controllers\Pemberi_kerja;

use App\Http\Controllers\Controller;
use App\Models\BidangPekerjaan;
use App\Models\DataPemberiKerja;
use App\Models\Disabilitas;
use App\Models\District;
use App\Models\Jabatan;
use App\Models\JenisIndustri;
use App\Models\Keahlian;
use App\Models\Kontak;
use App\Models\LowonganKerja;
use App\Models\MacamDisabilitas;
use App\Models\MacamKeahlian;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganKerjaController extends Controller
{
    public function index()
    {
        $data_pemberi_kerja = DataPemberiKerja::firstWhere('id_users', Auth::user()->id);
        if ($data_pemberi_kerja) {
            $lowongan_kerja = LowonganKerja::where('id_data_pemberi_kerja', $data_pemberi_kerja->id)->orderBy('id', 'asc')->paginate(5);
            return view(
                'pemberi_kerja.lowongan_kerja.lowongan_kerja',
                [
                    'data_pemberi_kerjas' => $data_pemberi_kerja,
                    'lowongan_kerjas' => $lowongan_kerja,
                ]
            );
        }
        return view('pemberi_kerja.lowongan_kerja.lowongan_kerja')->withErrors(['pesan' => 'KOSONG']);
    }
    public function create()
    {
        $jabatan = Jabatan::all();
        $provinces = Province::all();
        $bidang_pekerjaan = BidangPekerjaan::all();
        $jenis_industri = JenisIndustri::all();
        $macam_keahlian = MacamKeahlian::all();
        $macam_disabilitas = MacamDisabilitas::all();
        return view('pemberi_kerja.lowongan_kerja.tambah_lowongan_kerja', [
            'jabatans' => $jabatan,
            'provinsis' => $provinces,
            'bidang_pekerjaans' => $bidang_pekerjaan,
            'jenis_industris' => $jenis_industri,
            'macam_keahlians' => $macam_keahlian,
            'macam_disabilitas' => $macam_disabilitas,
        ]);
    }
    public function store(Request $request)
    {
        $kontaks = collect(json_decode($request->kontaks))->map(function ($kontak) {
            return ['nama' => $kontak->value];
        })->toArray();

        $pemberi_kerja = DataPemberiKerja::firstWhere('id_users', Auth::id());
        $lowongan_kerja = $pemberi_kerja
            ->lowongan_kerja()
            ->create($request->except([
                'macam_keahlian',
                'kontaks',
                'disabilitas_tidak_boleh',
                '_token'
            ]));
        $lowongan_kerja->disabilitas()->sync($request->disabilitas_tidak_boleh);
        $lowongan_kerja->keahlians()->sync($request->macam_keahlian);
        $lowongan_kerja->kontaks()->createMany($kontaks);
        return response()->json(['error' => false, 'lowongan_kerjas' => $lowongan_kerja,], 200);
    }
    public function show($id)
    {
        $lowongan_kerja = LowonganKerja::with(['disabilitas', 'keahlians', 'kontaks'])->find($id);
        $jabatan = Jabatan::all();
        $provinces = Province::all();
        $get_kelurahan = Village::firstWhere('id', $lowongan_kerja->kelurahan_id);
        $get_kecamatan = District::firstWhere('id', $get_kelurahan->district_id);
        $get_kabupaten = Regency::firstWhere('id', $get_kecamatan->regency_id);
        $get_provinsi = Province::firstWhere('id', $get_kabupaten->province_id);
        $bidang_pekerjaan = BidangPekerjaan::all();
        $jenis_industri = JenisIndustri::all();
        $macam_keahlian = MacamKeahlian::all();
        $macam_disabilitas = MacamDisabilitas::all();
        return view(
            'pemberi_kerja.lowongan_kerja.ubah_lowongan_kerja',
            [
                'lowongan_kerjas' => $lowongan_kerja,
                'jabatans' => $jabatan,
                'provinsis' => $provinces,
                'get_provinsi' => $get_provinsi,
                'get_kabupaten' => $get_kabupaten,
                'get_kecamatan' => $get_kecamatan,
                'get_kelurahan' => $get_kelurahan,
                'bidang_pekerjaans' => $bidang_pekerjaan,
                'jenis_industris' => $jenis_industri,
                'macam_keahlians' => $macam_keahlian,
                'macam_disabilitas' => $macam_disabilitas,
            ]
        );
    }
    public function edit($id)
    {
        $lowongan_kerja = LowonganKerja::find($id);
        return response()->json(['error' => false, 'lowongan_kerjas' => $lowongan_kerja,], 200);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // delete data yang ada pada many to many 
        $lowongan_kerjas = LowonganKerja::find($id);
        $lowongan_kerjas->disabilitas()->detach();
        $lowongan_kerjas->keahlians()->detach();
        $lowongan_kerjas->kontaks()->delete();

        //collect data kontak dan ubah ke array
        $kontaks = collect(json_decode($request->kontaks))->map(function ($kontak) {
            return ['nama' => $kontak->value];
        })->toArray();

        $lowongan_kerjas
            ->update($request->except([
                'macam_keahlian',
                'kontaks',
                'disabilitas_tidak_boleh',
                '_token',
            ]));
        $lowongan_kerjas->disabilitas()->sync($request->disabilitas_tidak_boleh);
        $lowongan_kerjas->keahlians()->sync($request->macam_keahlian);
        $lowongan_kerjas->kontaks()->createMany($kontaks);
        return response()->json(['error' => false, 'lowongan_kerjas' => $lowongan_kerjas,], 200);
    }
    public function destroy($id)
    {
        $lowongan_kerja = LowonganKerja::find($id);
        $lowongan_kerja->disabilitas()->detach();
        $lowongan_kerja->keahlians()->detach();
        $lowongan_kerja->kontaks()->delete();
        $lowongan_kerja = LowonganKerja::destroy($id);
        return response()->json(['error' => false, 'lowongan_kerjas' => $lowongan_kerja,], 200);
    }
    public function load_kabupaten_lowongan($id)
    {
        $kabupaten = Regency::where('province_id', $id)->get();
        return $kabupaten;
    }
    public function load_kecamatan_lowongan($id)
    {
        $kecamatan = District::where('regency_id', $id)->get();
        return $kecamatan;
    }
    public function load_kelurahan_lowongan($id)
    {
        $kelurahan = Village::where('district_id', $id)->get();
        return $kelurahan;
    }
}
