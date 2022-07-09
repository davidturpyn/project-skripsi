<?php

namespace App\Http\Controllers\Pemberi_kerja;

use App\Http\Controllers\Controller;
use App\Models\DataPemberiKerja;
use App\Models\JadwalInterview;
use App\Models\LowonganKerja;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;

class JadwalInterviewPerusahaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pemberi_kerja = DataPemberiKerja::firstWhere('id_users', Auth::user()->id);

        if ($data_pemberi_kerja) {
            $lowongan_kerja = LowonganKerja::where('id_data_pemberi_kerja', $data_pemberi_kerja->id)->get();
            $jadwal_interview = JadwalInterview::orderBy('id', 'asc')->paginate(5);
            return view('pemberi_kerja.jadwal_interview.jadwal_interview')->with(
                [
                    'data_pemberi_kerjas' => $data_pemberi_kerja,
                    'jadwal_interviews' => $jadwal_interview,
                    'lowongan_kerjas' => $lowongan_kerja,
                ]
            );
        }
        return view('pemberi_kerja.jadwal_interview.jadwal_interview')->with([
            'data_pemberi_kerjas' => $data_pemberi_kerja,
        ])->withErrors(['pesan' => 'KOSONG']);
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
        // dd($request);
        $tanggal_interview = SupportCarbon::parse($request->tanggal)->format('Y-m-d H:i:s');
        $jadwal_interview = JadwalInterview::Create([
            'nama_interview' => $request->nama,
            'tanggal_interview' => $tanggal_interview,
            'alamat_interview' => $request->alamat,
            'keterangan' => $request->keterangan_jadwal,
            'id_lowongan_kerja' => $request->id_lowongan,
        ]);
        return response()->json(['error' => false, 'jadwal_interviews' => $jadwal_interview,], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal_interview = JadwalInterview::find($id);
        return response()->json(['error' => false, 'jadwal_interviews' => $jadwal_interview,], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $tanggal_interview = Carbon::parse($request->input('tanggal'))->format('Y-m-d H:i:s');
        // dd($tanggal_interview);
        $jadwal_interview = JadwalInterview::find($id);
        $jadwal_interview->nama_interview = $request->input('nama');
        $jadwal_interview->tanggal_interview = $tanggal_interview;
        $jadwal_interview->alamat_interview = $request->input('alamat');
        $jadwal_interview->keterangan = $request->input('keterangan_jadwal');
        $jadwal_interview->id_lowongan_kerja = $request->input('id_lowongan');
        $jadwal_interview->save();
        return response()->json(['error' => false, 'jadwal_interviews' => $jadwal_interview,], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal_interview = JadwalInterview::destroy($id);
        return response()->json(['error' => false, 'jadwal_interviews' => $jadwal_interview,], 200);
    }
}
