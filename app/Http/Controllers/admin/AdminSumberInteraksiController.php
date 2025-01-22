<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SumberInteraksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSumberInteraksiController extends Controller
{
    //

    public function index() {
        return view('admin.adminsumberinteraksi',[
            'seo_title' => 'Admin | Sumber Interaksi',
            'allsumberinteraksi' => SumberInteraksi::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $sumber_interaksi = $request->validate([
                'nama_sumber' => ['required','string','unique:sumber_interaksis,nama_sumber'],
            ],[
                'nama_sumber.required' => 'Nama harus di isi',
                'nama_sumber.unique' => 'Nama Akun sudah ada'
            ]);
    
            $sumber_interaksi = new SumberInteraksi();
            $sumber_interaksi->nama_sumber = $request->nama_sumber;
            $sumber_interaksi->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Akun Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.akun.penjualan')->withInput()->with('error',$th->getMessage());
        }
        

    }
}
