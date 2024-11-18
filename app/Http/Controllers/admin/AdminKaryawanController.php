<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Posisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKaryawanController extends Controller
{
    //

    public function index(){
        return view('admin.adminkaryawan',[
            'seo_title' => 'Admin | Karyawan',
            'allkaryawan' => Karyawan::with('rJabatanKaryawan','rPosisiKaryawan')->get(),
            'alljabatan' => Jabatan::all(),
            'allposisi' => Posisi::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $karyawan = $request->validate([
                'nama_karyawan' => ['required','string'],
                'jabatan_id' => ['required'],
                'posisi_id' => ['required'],
                'status' => ['required'],
            ],[
                'nama_karyawan.required' => 'Nama harus di isi',
                'nama_karyawan.string' => 'Nama harus berisi huruf',
                'status.required' => 'Status harus di pilih',
            ]);
    
            $karyawan = new Karyawan();
            $karyawan->nama_karyawan = $request->nama_karyawan;
            $karyawan->jabatan_id = $request->jabatan_id;
            $karyawan->posisi_id = $request->posisi_id;
            $karyawan->status = $request->status;
            $karyawan->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Karyawan Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
        

    }
}
