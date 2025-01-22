<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StrategiSelling;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStrategiSellingController extends Controller
{
    //

    public function index() {
        return view('admin.adminstrategiselling',[
            'seo_title' => 'Admin | Strategi Selling',
            'allstrategiselling' => StrategiSelling::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $strategi_selling = $request->validate([
                'nama_strategi' => ['required','string','unique:strategi_sellings,nama_strategi'],
            ],[
                'nama_strategi.required' => 'Nama harus di isi',
                'nama_strategi.unique' => 'Nama Strategi sudah ada'
            ]);
    
            $strategi_selling = new StrategiSelling();
            $strategi_selling->nama_strategi = $request->nama_strategi;
            $strategi_selling->save();    //code...
            DB::commit();
            return redirect()->back()->with('success','Data Strategi Berhasil di simpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.strategi.sellings')->withInput()->with('error',$th->getMessage());
        }
        

    }
}
