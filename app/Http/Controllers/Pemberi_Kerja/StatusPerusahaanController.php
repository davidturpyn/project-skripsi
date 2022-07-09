<?php

namespace App\Http\Controllers\Pemberi_Kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\JenisIndustri;
use App\Models\Province;
use App\Models\StatusPerusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusPerusahaanController extends Controller
{
    public function store(Request $request)
    {
        $status_perusahaans = StatusPerusahaan::Create([
            'status_kepemilikan' => $request->id_status_kepemilikan,
            'status_pemodal' => $request->id_status_pemodal,
            'negara' => $request->negara_status_perusahaan,
            'id_users' => Auth::user()->id,
        ]);
        return redirect()->route("profil_pemberi_kerja.index");
    }
    public function update(Request $request, $id)
    {
        $status_perusahaans = StatusPerusahaan::find($id);
        $status_perusahaans->status_kepemilikan = $request->id_status_kepemilikan;
        $status_perusahaans->status_pemodal = $request->id_status_pemodal;
        $status_perusahaans->negara = $request->input('negara_status_perusahaan');
        if ($status_perusahaans->save()){
            return response()->json(['error' => false, 'status_perusahaans' => $status_perusahaans,], 200); 
        }
        else{
            return response()->json(['error' => true, 'status_perusahaans' => $status_perusahaans,], 500);
        }
    }
}
