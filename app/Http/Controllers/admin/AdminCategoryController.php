<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index(){
        return view('admin.admincategory',[
            'seo_title' => 'Admin | Kategori Produk',
            'allcategory' => Category::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $kategori = $request->validate([
                'nama_kategori' => ['required','string','unique:categories,category_name'],
            ],[
                'nama_kategori.required' => 'Nama Kategori harus di isi',
                'nama_kategori.unique' => 'Nama  Kategori sudah ada',
            ]);
    
            $kategori = new Category();
            $kategori->category_name = $request->nama_kategori;
            $kategori->save();    //code...

            DB::commit();
            return redirect()->back()->with('success','Data kategori Berhasil di simpan');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('admin.category')->withInput()->with('error',$th->getMessage());
        }
        

    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.admincategoryedit',[
            'seo_title' => 'Admin | Edit Kategori Produk',
            'category' => $category,
        ]);
    }   

    public function update(Request $request){
        $id = $request->id;
        $category = Category::find($id);
        $category->category_name = $request->nama_kategori;
        $category->save();
        return redirect()->route('admin.category')->with('success','Data kategori Berhasil di update');
    }   

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Data kategori Berhasil di Hapus');
    }
}
