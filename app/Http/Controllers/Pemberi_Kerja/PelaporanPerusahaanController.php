<?php

namespace App\Http\Controllers\Pemberi_Kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PelaporanPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pemberi_kerja = DataPemberiKerja::firstWhere('id_users', Auth::user()->id);
        if ($data_pemberi_kerja)
        {
            $pelaporan = Pelaporan::where('id_data_pemberi_kerja', $data_pemberi_kerja->id)->orderBy('id', 'asc')->paginate(5);
            if ($pelaporan->count())
            {
                $status_laporan = Pelaporan::latest('id')->limit(1)->pluck('status');
                $tgl_berlaku_laporan  =  Pelaporan::latest('id')->limit(1)->pluck('tgl_berlaku');
                $tgl_berlapor_laporan = Pelaporan::latest('id')->limit(1)->pluck('tgl_berlapor');
                return view('pemberi_kerja.pelaporan_perusahaan.pelaporan_perusahaan', [
                    'pelaporans' => $pelaporan,
                    'data_pemberi_kerjas' => $data_pemberi_kerja,
                    'status_laporans' => $status_laporan,
                    'tgl_berlaku_laporans' => $tgl_berlaku_laporan,
                    'tgl_berlapor_laporans' => $tgl_berlapor_laporan,
                ]);
            }
            return view('pemberi_kerja.pelaporan_perusahaan.pelaporan_perusahaan', [
                'pelaporans' => $pelaporan,
                'data_pemberi_kerjas' => $data_pemberi_kerja,
            ]);
        }
        return view('pemberi_kerja.pelaporan_perusahaan.pelaporan_perusahaan')->withErrors(['pesan' => 'KOSONG']);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_pemberi_kerja = DataPemberiKerja::firstWhere('id_users', Auth::user()->id);
        $pelaporan = Pelaporan::Create([
            'status' => $request->status,
            'tgl_berlapor' => $request->tgl_berlapor,
            'tgl_berlaku' => $request->tgl_berlaku,
            'id_data_pemberi_kerja' => $id_pemberi_kerja->id,
        ]);
        return response()->json(['error' => false, 'pelaporans' => $pelaporan,], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
