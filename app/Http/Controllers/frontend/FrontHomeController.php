<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    //
    public function index(){

        return view('frontend.fronthome',[
            'streaming' => Products::where('category_id',1)->get(),
            'productivitas' => Products::where('category_id',2)->get(),
            'utilitas' => Products::where('category_id',3)->get(),
            'uncategory' => Products::where('category_id',4)->get(),
            'entertainment' => Products::where('category_id',5)->get(),
            'editing' => Products::where('category_id',6)->get(),
            'storage' => Products::where('category_id',7)->get(),
            'ai' => Products::where('category_id',8)->get(),
            'antivirus' => Products::where('category_id',9)->get(),
            'vpn' => Products::where('category_id',10)->get(),
        ]);
    }

}
