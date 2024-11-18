<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminPelangganController extends Controller
{
    //
    public function index(){
        return view('admin.adminpelanggan',[
            'seo_title' => 'Admin | Pelanggan',
            'allpelanggan' => Pelanggan::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $pelanggan = $request->validate([
                'nama_pelanggan' => ['required','string'],
                'email' => ['required','string','unique:pelanggans,email'],
                'telepon' => ['required','string','unique:pelanggans,telepon'],
                'instagram' => ['required','string','unique:pelanggans,instagram'],
                
            ],[
                'nama_pelanggan.required' => 'Email harus di isi',
                'email.required' => 'Email harus di isi',
                'email.unique' => 'Email sudah digunakan',
                'telepon.required' => 'Telepon harus di isi',
                'telepon.unique' => 'Telepon sudah digunakan',
                'instagram.required' => 'Instagram harus di isi',
                'instagram.unique' => 'Instagram sudah digunakan',
            ]);
    
            $pelanggan = new Pelanggan();
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->email = $request->email;
            $pelanggan->telepon = $request->telepon;
            $pelanggan->instagram = $request->instagram;
            $pelanggan->password = Hash::make($request->email);
            $pelanggan->status = '1';
            $pelanggan->save();    //code...

            DB::commit();
            return redirect()->back()->with('success','Data Pelanggan Berhasil di simpan');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('admin.pelanggan')->withInput()->with('error',$th->getMessage());
        }
        

    }
}
