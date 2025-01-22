<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBankController extends Controller
{
    //

    public function index(){
        return view('admin.adminbank',[
            'seo_title' => 'Admin | Bank',
            'allbanks' => Bank::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $bank = $request->validate([
                'nama_pemilik' => ['required','string'],
                'nama_bank' => ['required','string'],
                'no_rek' => ['required','string'],
            ],[
                'nama_pemilik.required' => 'Nama Pemilik harus di isi',
                'nama_bank.required' => 'Nama Bank harus di isi',
                'no_rek.required' => 'Nomor Rekening harus di isi',
            ]);
    
            $bank = new Bank();
            $bank->nama_pemilik = $request->nama_pemilik;
            $bank->nama_bank = $request->nama_bank;
            $bank->no_rek = $request->no_rek;
            $bank->save();    //code...

            DB::commit();
            return redirect()->back()->with('success','Data Bank Berhasil di simpan');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('admin.bank')->withInput()->with('error',$th->getMessage());
        }
        

    }

    public function edit($id){
        $bank = Bank::find($id);
        return view('admin.adminbankedit',[
            'seo_title' => 'Admin | Edit Bank',
            'bank' => $bank,
        ]);
    }

    public function update(Request $request, $id){
        $bank = Bank::find($id);
        $bank->nama_pemilik = $request->nama_pemilik;
        $bank->nama_bank = $request->nama_bank;
        $bank->no_rek = $request->no_rek;
        $bank->save();
        return redirect()->route('admin.bank')->with('success','Data Bank Berhasil di update');
    }

    public function destroy($id){
        $bank = Bank::find($id);
        $bank->delete();
        return redirect()->back()->with('success','Data Bank Berhasil di Hapus');
    }   

}
