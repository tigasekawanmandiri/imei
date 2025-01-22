<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Varian;
use Illuminate\Http\Request;

class FrontDetailPordukController extends Controller
{
    //
    public function detailProduk($slug){
        return view('frontend.frontdetailproduct',[
            'details' => Products::with('rProductVarian')->where('product_slug',$slug)->first(),
        ]);
    }

    public function toCheckout(Request $request){
        return view('frontend.checkout',[
            'checkout'=> Varian::where('id', $request->varian_id)->first(),
        ]);
    }
}
