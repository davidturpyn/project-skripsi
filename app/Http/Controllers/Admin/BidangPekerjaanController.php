<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BidangPekerjaan;

class BidangPekerjaanController extends Controller
{
    public function index()
    {
        $bidang_pekerjaan = BidangPekerjaan::orderBy('id', 'asc')->paginate(5); 
        return view('admin.bidang_pekerjaan.bidang_pekerjaan')->with('bidang_pekerjaans',$bidang_pekerjaan); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), 
        array( 'nama' => 'required' )); 
        if ($validator->fails()) {
            return response()->json([ 'error' => true, 'messages' => $validator->errors(), ], 422);
        } 
        $bidang_pekerjaan = BidangPekerjaan::create($request->all()); 
        return response()->json([ 'error' => false, 'bidang_pekerjaans' => $bidang_pekerjaan, ], 200); 
    }

    public function show($id)
    {
        $bidang_pekerjaan = BidangPekerjaan::find($id);
        return response()->json([ 'error' => false, 'bidang_pekerjaans' => $bidang_pekerjaan, ], 200); 
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), array( 'nama' => 'required' )); 
        if ($validator->fails()) { 
            return response()->json([ 'error' => true, 'messages' => $validator->errors(), ], 422); 
        } 
        $bidang_pekerjaan = BidangPekerjaan::find($id); 
        $bidang_pekerjaan->nama = $request->input('nama'); 
        $bidang_pekerjaan->save(); 
        return response()->json([ 'error' => false, 'bidang_pekerjaans' => $bidang_pekerjaan, ], 200); 
    }

    public function destroy($id)
    {
        $bidang_pekerjaan = BidangPekerjaan::destroy($id); 
        return response()->json([ 'error' => false, 'bidang_pekerjaans' => $bidang_pekerjaan, ], 200); 
    }
}
