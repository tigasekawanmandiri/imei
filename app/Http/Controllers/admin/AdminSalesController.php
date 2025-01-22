<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AkunPenjualan;
use App\Models\Bank;
use App\Models\KanalPenjualan;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\Sales;
use App\Models\SalesDetail;
use App\Models\StrategiSelling;
use App\Models\SumberInteraksi;
use App\Models\Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AdminSalesController extends Controller
{
    //
    
    public function index(){
        $rand = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $invoice = substr(str_shuffle($rand), 0, 5);

        return view('admin.adminsales',[
            'seo_title' => 'Admin | Sales',
            'allpelanggan'=> Pelanggan::all(),
            'allsumberinteraksi' => SumberInteraksi::all(),
            'allstrategi' => StrategiSelling::all(),
            'allkanal' => KanalPenjualan::all(),
            'allakun' => AkunPenjualan::all(),
            'cs' => Karyawan::with('rPosisiKaryawan')->where('status','1')->where('posisi_id','1')->get(),
            'invoice' => date('m').'/'.date('Y').'/'.$invoice,
            'banks' => Bank::all()
        ]);
    }

    public function selectProduk(){
        $produk = Varian::with('sproductname','sdurationname')->get();
        return Response::json($produk);
    }

    public function store(Request $request){

        $sales = $request->bukti_transfer;
        $rand = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = substr(str_shuffle($rand), 0, 8);
        if($request->hasFile('bukti_transfer')) {
            $request->validate([
                'bukti_transfer' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            $ext = $request->file('bukti_transfer')->extension();
            $final_name = date('YmdHis') . "." . $random.'.'.$ext;
            $request->file('bukti_transfer')->move(public_path('files/bukti_transfer/'),$final_name);
            $bukti_tf = $final_name;
        }

        $sales = Sales::create([
            'invoice' => $request->invoice,
            'tanggal' => $request->tanggal,
            'cs_id' => $request->cs_id,
            'shift_id' => $request->shift_id,
            'pukul' => $request->pukul,
            'pelanggan_id' => $request->pelanggan_id,
            'kanal_id' => $request->kanal_id,
            'akun_id' => $request->akun_id,
            'sumber_id' => $request->sumber_id,
            'strategi_id' => $request->strategi_id,
            'bank_id' => $request->bank_id,
            'bukti_transfer' => $bukti_tf,
            'total' => $request->total,
            'status' => '1'
        ]);
        
        foreach ($request->varian_id as $key => $values) {
            $salesDetail['sales_id'] = $sales->id;
            $salesDetail['varian_id'] = $request->varian_id[$key];
            $salesDetail['qty'] = $request->qty[$key];
            $salesDetail['price'] = $request->price[$key];
            $salesDetail['diskon'] = $request->diskon[$key];
            $salesDetail['subtotal'] = $request->subtotal[$key];

            SalesDetail::create($salesDetail);
    }

        return redirect()->route('admin.sales')->with('success', 'Sales Created successfully.');

    }
}
