<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AdminPosisiController extends Controller
{
    //

    public function index() {
        return view('admin.adminposisi',[
            'seo_title' => 'Admin | Posisi',
            'allposisi' => Posisi::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $posisi = $request->validate([
                'nama_posisi' => ['required','string','unique:posisis,nama_posisi'],
            ],[
                'nama_posisi.required' => 'Nama harus di isi',
                'nama_posisi.unique' => 'Nama posisi sudah ada'
            ]);
    
            $posisi = new Posisi();
            $posisi->nama_posisi = $request->nama_posisi;
            $posisi->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Posisi Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error',$th->getMessage());
        }
        

    }
}
