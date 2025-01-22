<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Duration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDurationController extends Controller
{
    //

    public function index(){
        return view('admin.admindurationn',[
            'seo_title' => 'Admin | Duration',
            'alldurations' => Duration::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse {

        DB::beginTransaction();
        try {
            $durasi = $request->validate([
                'nama_durasi' => ['required','string','unique:durations,duration_name'],
            ],[
                'nama_durasi.required' => 'Nama Durasi harus di isi',
                'nama_durasi.unique' => 'Nama  Durasi sudah ada',
            ]);
    
            $durasi = new Duration();
            $durasi->duration_name = $request->nama_durasi;
            $durasi->save();    //code...

            DB::commit();
            return redirect()->back()->with('success','Data Durasi Berhasil di simpan');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('admin.duration')->withInput()->with('error',$th->getMessage());
        }
        

    }

    public function edit($id){
        $duration = Duration::find($id);
        return view('admin.admindurationedit',[
            'seo_title' => 'Admin | Edit Durasi',
            'duration' => $duration,
        ]);
    }

    public function update(Request $request, $id){
        $duration = Duration::find($id);
        $duration->duration_name = $request->nama_durasi;
        $duration->save();
        return redirect()->route('admin.duration')->with('success','Data Durasi Berhasil di update');
    }

    public function destroy($id){
        $duration = Duration::find($id);
        $duration->delete();
        return redirect()->back()->with('success','Data Durasi Berhasil di Hapus');
    }   

    public function selectDuration() {
        $durations = Duration::all();
        return response()->json($durations);
    }

}
