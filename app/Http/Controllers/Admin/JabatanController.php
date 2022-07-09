<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    
    public function index()
    {
        $jabatan = Jabatan::orderBy('id', 'asc')->paginate(5); 
        return view('admin.jabatan.jabatan')->with('jabatans',$jabatan); 
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), 
        array( 'nama' => 'required' )); 
        if ($validator->fails()) {
            return response()->json([ 'error' => true, 'messages' => $validator->errors(), ], 422);
        } 
        $jabatan = Jabatan::create($request->all()); 
        return response()->json([ 'error' => false, 'jabatans' => $jabatan, ], 200); 
    }

    public function show($id)
    {
        $jabatan = Jabatan::find($id);
        return response()->json([ 'error' => false, 'jabatans' => $jabatan, ], 200); 
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
        $jabatan = Jabatan::find($id); 
        $jabatan->nama = $request->input('nama'); 
        $jabatan->save(); 
        return response()->json([ 'error' => false, 'jabatans' => $jabatan, ], 200); 
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::destroy($id); 
        return response()->json([ 'error' => false, 'jabatans' => $jabatan, ], 200); 
    }
}
