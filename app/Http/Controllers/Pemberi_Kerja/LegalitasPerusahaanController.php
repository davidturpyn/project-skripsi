<?php

namespace App\Http\Controllers\Pemberi_Kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\JenisIndustri;
use App\Models\LegalitasPerusahaan;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LegalitasPerusahaanController extends Controller
{
    public function store(Request $request)
    {
        $legalitasperusahaan = LegalitasPerusahaan::Create([
            'no_perizinan' => $request->no_perizinan_perusahaan,
            'no_tdp' => $request->no_tdp_perusahaan,
            'no_akta_perusahaan' => $request->no_akta_perusahaan,
            'npwp_perusahaan' => $request->npwp_perusahaan,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat_pemilik' => $request->alamat_pemilik,
            'nama_pengurus' => $request->nama_pengurus,
            'alamat_pengurus' => $request->alamat_pengurus,
            'id_users' => Auth::user()->id,
        ]);
        return redirect()->route("profil_pemberi_kerja.index");
    }

    public function update(Request $request, $id)
    {
        $legalitasperusahaan = LegalitasPerusahaan::find($id);
        $legalitasperusahaan->no_perizinan = $request->input('no_perizinan_perusahaan');
        $legalitasperusahaan->no_tdp = $request->input('no_tdp_perusahaan');
        $legalitasperusahaan->no_akta_perusahaan = $request->input('no_akta_perusahaan');
        $legalitasperusahaan->npwp_perusahaan = $request->input('npwp_perusahaan');
        $legalitasperusahaan->nama_pemilik = $request->input('nama_pemilik');
        $legalitasperusahaan->alamat_pemilik = $request->input('alamat_pemilik');
        $legalitasperusahaan->nama_pengurus = $request->input('nama_pengurus');
        $legalitasperusahaan->alamat_pengurus = $request->input('alamat_pengurus');
        if ($legalitasperusahaan->save()){
            return response()->json(['error' => false, 'legalitasperusahaans' => $legalitasperusahaan,], 200); 
        }
        else{
            return response()->json(['error' => true, 'legalitasperusahaans' => $legalitasperusahaan,], 500);
        }
    }
}
