<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminJabatanController extends Controller
{
    //

    
    public function index() {
        return view('admin.adminjabatan',[
            'seo_title' => 'Admin | Jabatan',
            'alljabatan' => Jabatan::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $jabatan = $request->validate([
                'nama_jabatan' => ['required','string','unique:jabatans,nama_jabatan'],
            ],[
                'nama_jabatan.required' => 'Nama harus di isi',
                'nama_jabatan.unique' => 'Nama Jabatan sudah ada'
            ]);
    
            $jabatan = new Jabatan();
            $jabatan->nama_jabatan = $request->nama_jabatan;
            $jabatan->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Jabatan Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
        

    }
}
