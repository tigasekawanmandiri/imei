<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KanalPenjualan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKanalPenjualanController extends Controller
{
    //

    public function index() {
        return view('admin.adminkanalpenjualan',[
            'seo_title' => 'Admin | Kanal Penjualan',
            'allkanalpenjualan' => KanalPenjualan::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $kanal_penjualan = $request->validate([
                'nama_kanal' => ['required','string','unique:kanal_penjualans,nama_kanal'],
            ],[
                'nama_kanal.required' => 'Nama harus di isi',
                'nama_kanal.unique' => 'Nama Kanal sudah ada'
            ]);
    
            $kanal_penjualan = new KanalPenjualan();
            $kanal_penjualan->nama_kanal = $request->nama_kanal;
            $kanal_penjualan->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Kanal Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.kanal.penjualan')->withInput()->with('error',$th->getMessage());
        }
        

    }
}
