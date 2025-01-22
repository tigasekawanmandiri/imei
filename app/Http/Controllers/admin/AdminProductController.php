<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Duration;
use App\Models\Products;
use App\Models\Varian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index() {
        return view('admin.adminproduct',[
            'seo_title' => 'Admin | Products',
            'allproducts' => Products::with('rProductCategory')->get(),
        ]);
    }

    public function create(){
        return view('admin.adminproductcreate') ->with([
            'seo_title' => 'Admin | Tambah Products',
            'category' => Category::all()
        ]);
    }

    public function edit($id){
        return view('admin.adminproductedit') ->with([
            'seo_title' => 'Admin | Tambah Products',
            'products' => Products::where('id', $id)->first(),
            'category' => Category::all(),
            'varians' => Varian::where('product_id', $id)->get(),
            'durations' => Duration::all(),
        ]);
    }

    public function store(Request $request) {

        request()->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_description' => 'required',
        ]);

        $product = $request->product_thumbnail;
        $rand = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = substr(str_shuffle($rand), 0, 8);
        if($request->hasFile('product_thumbnail')) {
            $request->validate([
                'product_thumbnail' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            $ext = $request->file('product_thumbnail')->extension();
            $final_name = date('YmdHis') . "." . $random.'.'.$ext;
            $request->file('product_thumbnail')->move(public_path('files/thumbnail_product/'),$final_name);
            $product = $final_name;
        }

        $product = Products::create([
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_description' => $request->product_description,
            'category_id' => $request->category_id,
            'product_thumbnail' => $product,
        ]);
        
        foreach ($request->duration_id as $key => $values) {
            $varian['product_id'] = $product->id;
            $varian['duration_id'] = $request->duration_id[$key];
            $varian['price'] = $request->price[$key];

            Varian::create($varian);
    }

        return redirect()->back()->with('success', 'Product Created successfully.');

    }

    public function update(Request $request, $id ){

        // dd($request);

        $product = Products::where('id', $id)->first();
        request()->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_description' => 'required',
        ]);

        $rand = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = substr(str_shuffle($rand), 0, 8);
        if($request->hasFile('product_thumbnail')) {
            $request->validate([
                'product_thumbnail' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('files/thumbnail_product/'.$product->product_thumbnail));
            $ext = $request->file('product_thumbnail')->extension();
            $final_name = date('YmdHis') . "." . $random.'.'.$ext;
            $request->file('product_thumbnail')->move(public_path('files/thumbnail_product/'),$final_name);
            $product->product_thumbnail = $final_name;
        }

        // Set the individual attributes
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->product_description = $request->product_description;
        $product->category_id = $request->category_id;

        // Save the product
        $product->update();

        foreach ($request->varian_id as $key => $values) {
            $varian['id'] = $request->varian_id[$key];
            $varian['product_id'] = $id;
            $varian['duration_id'] = $request->duration_id[$key];
            $varian['price'] = $request->price[$key];

            Varian::where('id', $request->varian_id[$key])->update($varian);
    }

        return redirect()->back()->with('success', 'Product Created successfully.');
    }

}
