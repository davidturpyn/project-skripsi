<?php

namespace App\Http\Controllers\Pemberi_Kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\LowonganKerja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPemberiKerjaController extends Controller
{
    public function index()
    {
        $data_pemberi_kerja = DataPemberiKerja::firstWhere('id_users',Auth::user()->id);
        return view('pemberi_kerja.dashboard');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function status_lowongan(Request $request)
    {
        $date_now = date('Y-m-d');
        $date_now2 = Carbon::now()->toDateString();
        $profil = DataPemberiKerja::firstWhere('id_users',Auth::user()->id);
        $lowongan = \null;

        //cara baca dari kanan untuk perbandingan tanggal nya
        if($request->status == 'aktif'){
            $lowongan = LowonganKerja::where([
                    ['id_data_pemberi_kerja', '=', $profil->id],
                    ['tanggal_tayang', '<=', $date_now],
                    ['tanggal_expired', '>', $date_now]
                ])->get();
        }
        else if($request->status == 'tidak_aktif')
        {
            $lowongan = LowonganKerja::where('id_data_pemberi_kerja', '=', $profil->id)
                ->where(function ($q) use($date_now) {
                    return $q->where('tanggal_tayang', '>=', $date_now)
                        ->orWhere('tanggal_expired', '<=', $date_now);
                })
                ->get();
        }
        else
        {
            $lowongan = LowonganKerja::where('id_data_pemberi_kerja', $profil->id)->get();
        }
        return \response()->json(['lowongans' => $lowongan]);
    }
}
