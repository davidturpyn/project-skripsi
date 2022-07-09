<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JenisIndustri;

class JenisIndustriController extends Controller
{
    public function index()
    {
        $jenis_industri = JenisIndustri::orderBy('id', 'asc')->paginate(5); 
        return view('admin.jenis_industri.jenis_industri')->with('jenis_industris',$jenis_industri); 
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
        $jenis_industri = JenisIndustri::create($request->all()); 
        return response()->json([ 'error' => false, 'jenis_industris' => $jenis_industri, ], 200);
    }

    public function show($id)
    {
        $jenis_industri = JenisIndustri::find($id);
        return response()->json([ 'error' => false, 'jenis_industris' => $jenis_industri, ], 200); 
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
        $jenis_industri = JenisIndustri::find($id); 
        $jenis_industri->nama = $request->input('nama'); 
        $jenis_industri->save(); 
        return response()->json([ 'error' => false, 'jenis_industris' => $jenis_industri, ], 200);
    }

    public function destroy($id)
    {
        $jenis_industri = JenisIndustri::destroy($id); 
        return response()->json([ 'error' => false, 'jenis_industris' => $jenis_industri, ], 200); 
    }
}
