<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\LegalitasPerusahaan;
use App\Models\Pelaporan;
use App\Models\StatusPerusahaan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class ExportController extends Controller
{
    public function export_laporan()
    {
        $user = User::find(Auth::user()->id);
        
        $legalitas = LegalitasPerusahaan::firstWhere('id_users',Auth::user()->id);
        $status_perusahaan = StatusPerusahaan::firstWhere('id_users',Auth::user()->id);
    	$data_pemberi_kerja = DataPemberiKerja::firstWhere('id_users', Auth::user()->id);
        $pelaporan = Pelaporan::latest('id')->first();
        $status_laporan = Pelaporan::latest('id')->limit(1)->pluck('status');
        $tgl_berlaku_laporan  =  Pelaporan::latest('id')->limit(1)->pluck('tgl_berlaku');
        $tgl_berlapor_laporan = Pelaporan::latest('id')->limit(1)->pluck('tgl_berlapor');
    	$pdf = PDF::loadview('pemberi_kerja.pelaporan_pdf.pelaporan_pdf',
        [
            'users'=>$user,
            'legalitas'=>$legalitas,
            'status_perusahaans'=>$status_perusahaan,
            'pelaporans'=>$pelaporan,
            'data_pemberi_kerjas'=>$data_pemberi_kerja,
            'status_laporans' => $status_laporan,
            'tgl_berlaku_laporans' => $tgl_berlaku_laporan,
            'tgl_berlapor_laporans' => $tgl_berlapor_laporan,
        ]);
    	return $pdf->stream();
    }
    
}
