<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AkunPenjualan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAkunPenjualanController extends Controller
{
    //
    public function index() {
        return view('admin.adminakunpenjualan',[
            'seo_title' => 'Admin | Akun Penjualan',
            'allakunpenjualan' => AkunPenjualan::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $akun_penjualan = $request->validate([
                'nama_akun' => ['required','string','unique:akun_penjualans,nama_akun'],
            ],[
                'nama_akun.required' => 'Nama harus di isi',
                'nama_akun.unique' => 'Nama Akun sudah ada'
            ]);
    
            $akun_penjualan = new AkunPenjualan();
            $akun_penjualan->nama_akun = $request->nama_akun;
            $akun_penjualan->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Akun Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.akun.penjualan')->withInput()->with('error',$th->getMessage());
        }
        

    }
}
