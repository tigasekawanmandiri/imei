<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    //
    public function checkoutNow(Request $request){
        
        $cek_pelanggan = Pelanggan::where('email', $request->email)->first();
        
        if($cek_pelanggan){
            $pelanggan = $cek_pelanggan;
            return redirect()->route('checkoutThanks')->with('success','Terima kasih Orderan Anda akan segera diproses');
        }else{
            $pelanggan = new Pelanggan();
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->email = $request->email;
            $pelanggan->telepon = $request->telepon;
            $pelanggan->instagram = $request->instagram;
            $pelanggan->password = Hash::make('12345678');
            $pelanggan->status = '1';
            $pelanggan->save();
            return redirect()->route('checkoutThanks')->with('success','Terima kasih Orderan Anda akan segera diproses');
        }
    }


    public function checkoutThanks(){
        return view('frontend.frontthanks');
    }
}
