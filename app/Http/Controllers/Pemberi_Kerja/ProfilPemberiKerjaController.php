<?php

namespace App\Http\Controllers\Pemberi_kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\District;
use App\Models\JenisIndustri;
use App\Models\LegalitasPerusahaan;
use App\Models\Province;
use App\Models\Regency;
use App\Models\StatusPerusahaan;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilPemberiKerjaController extends Controller
{
    public function index()
    {
        
        $jenis_industri = JenisIndustri::all();
        $provinces = Province::all();
        $user = User::find(Auth::user()->id);
        $status_perusahaan = StatusPerusahaan::firstWhere('id_users',$user->id);
        $legalitas_perusahaan = LegalitasPerusahaan::firstWhere('id_users',$user->id);
        $data_pemberi_kerja = DataPemberiKerja::with('jenis_industri')->firstWhere('id_users', Auth::user()->id);
        $get_kelurahan = Village::firstWhere('id', $data_pemberi_kerja->kelurahan_id);
        // dd($get_kelurahan->id);
        $get_kecamatan = District::firstWhere('id', $get_kelurahan->district_id);
        // dd($get_kecamatan->id);
        $get_kabupaten = Regency::firstWhere('id', $get_kecamatan->regency_id);
        $get_provinsi = Province::firstWhere('id', $get_kabupaten->province_id);
        return view('pemberi_kerja.profil_pemberi_kerja.profil_pemberi_kerja',[
            'users' => $user, 
            'data_pemberi_kerjas' => $data_pemberi_kerja,
            'jenis_industris' => $jenis_industri,
            'provinsis' => $provinces,
            'status_perusahaans' => $status_perusahaan,
            'legalitas_perusahaans' => $legalitas_perusahaan,
            'get_provinsi' => $get_provinsi,
            'get_kabupaten' => $get_kabupaten,
            'get_kecamatan' => $get_kecamatan,
            'get_kelurahan' => $get_kelurahan,
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $foto_banner = $request->file('url_banner');
        $data_pemberi_kerja = DataPemberiKerja::Create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'tgl_berdiri' => $request->tanggal_berdiri,
            'jumlah_cabang_dalam_negeri' => $request->jumlah_cabang_dalam_negeri,
            'jumlah_cabang_luar_negeri' => $request->jumlah_cabang_luar_negeri,
            'tentang_perusahaan' => $request->tentang_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'website_perusahaan' => $request->website_perusahaan,
            'url_banner' => "banner/". Auth::id().".". $foto_banner->extension(),
            'kelurahan_id' => $request->kelurahan,
            'nama_jalan' => $request->nama_jalan,
            'id_jenis_industri' => $request->id_jenis_industri,
            'id_users' => Auth::user()->id,
        ]);
        
        $foto_banner->storeAs("public/banner", Auth::id(). ".". $foto_banner->extension());

        return response()->json(['error' => false, 'data_pemberi_kerjas' => $data_pemberi_kerja,], 200);
    }
    public function update(Request $request, $id)
    {
        $foto_banner = $request->file('url_banner');
        $data_pemberi_kerja = DataPemberiKerja::find($id);
        $data_pemberi_kerja->nama_perusahaan = $request->input('nama_perusahaan');
        $data_pemberi_kerja->tgl_berdiri = $request->input('tanggal_berdiri');
        $data_pemberi_kerja->jumlah_cabang_dalam_negeri = $request->input('jumlah_cabang_dalam_negeri');
        $data_pemberi_kerja->jumlah_cabang_luar_negeri = $request->input('jumlah_cabang_luar_negeri');
        $data_pemberi_kerja->tentang_perusahaan = $request->input('tentang_perusahaan');
        $data_pemberi_kerja->website_perusahaan = $request->input('website_perusahaan');
        $data_pemberi_kerja->url_banner = "banner/". Auth::id().".". $foto_banner->extension();
        $data_pemberi_kerja->kelurahan_id = $request->kelurahan;
        $data_pemberi_kerja->nama_jalan = $request->input('nama_jalan');
        $data_pemberi_kerja->id_jenis_industri = $request->id_jenis_industri;
        $foto_banner->storeAs("public/banner", Auth::id(). ".". $foto_banner->extension());
        if ($data_pemberi_kerja->save()){
            return response()->json(['error' => false, 'data_pemberi_kerjas' => $data_pemberi_kerja,], 200); 
        }
        else{
            return response()->json(['error' => true, 'data_pemberi_kerjas' => $data_pemberi_kerja,], 500);
        }

    }

    public function load_kabupaten($id){
        $kabupaten = Regency::where('province_id', $id)->get();
        return $kabupaten;
    }
    public function load_kecamatan($id){
        $kecamatan = District::where('regency_id', $id)->get();
        return $kecamatan;
    }
    public function load_kelurahan($id){
        $kelurahan = Village::where('district_id', $id)->get();
        return $kelurahan;
    }
}
