<?php

namespace App\Http\Controllers\Pemberi_kerja;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TenagaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenaga_kerja = TenagaKerja::orderBy('id', 'asc')->paginate(5); 
        $jabatan = Jabatan::all();
        return view('pemberi_kerja.tenaga_kerja.tenaga_kerja')->with(
            [
                'tenaga_kerjas' => $tenaga_kerja,
                'jabatans' => $jabatan
            ]); 
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
    public function store(Request $request)
    {
        $tenaga_kerja = TenagaKerja::Create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'id_jabatan' => $request->id_jabatan,
            'pendidikan' => $request->pendidikan,
            'status_pekerja' => $request->status_pekerja,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'disabilitas' => $request->disabilitas,
            'bekerja' => $request->bekerja,
            'tgl_diterima' => $request->tgl_diterima,
            'alamat' => $request->alamat,
            'id_users' => Auth::user()->id,
        ]);
        return response()->json([ 'error' => false, 'tenaga_kerjas' => $tenaga_kerja, ], 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenaga_kerja = TenagaKerja::find($id);
        return response()->json([ 'error' => false, 'tenaga_kerjas' => $tenaga_kerja, ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenaga_kerja = TenagaKerja::find($id);
        $jabatan = Jabatan::all();
        return view('pemberi_kerja.tenaga_kerja.tenaga_kerja_modal.tenaga_kerja_edit', [
            'tenaga_kerjas' => $tenaga_kerja,
            'jabatans' => $jabatan,
        ]);
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
        $tenaga_kerja = TenagaKerja::find($id); 
        $tenaga_kerja->nik = $request->input('nik');
        $tenaga_kerja->nama_lengkap = $request->input('nama_lengkap');
        $tenaga_kerja->id_jabatan = $request->input('id_jabatan');
        $tenaga_kerja->pendidikan = $request->input('pendidikan');
        $tenaga_kerja->status_pekerja = $request->input('status_pekerja');
        $tenaga_kerja->jenis_kelamin = $request->input('jenis_kelamin');
        $tenaga_kerja->tgl_lahir = $request->input('tgl_lahir');
        $tenaga_kerja->bekerja = $request->input('bekerja');
        $tenaga_kerja->disabilitas = $request->input('disabilitas');
        $tenaga_kerja->tgl_diterima = $request->input('tgl_diterima');
        $tenaga_kerja->alamat = $request->input('alamat');
        $tenaga_kerja->save(); 
        return response()->json([ 'error' => false, 'tenaga_kerjas' => $tenaga_kerja, ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $tenaga_kerja = TenagaKerja::destroy($id); 
        return response()->json([ 'error' => false, 'tenaga_kerjas' => $tenaga_kerja, ], 200); 
    }

    
}
