<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Varian;
use Illuminate\Http\Request;

class AdminVarianController extends Controller
{
    //
    public function index(){
        return view('admin.adminvarian',[
            'seo_title' => 'Admin | Varian Produk',
            'alldurations' => Varian::all(),
        ]);
    }

    public function store(Request $request){}
}
