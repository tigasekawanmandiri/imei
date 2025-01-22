<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MainConfig;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    //

    public function index() {
        return view('admin.adminsettings',[
            'config'=> MainConfig::where('id', 1)->first(),
        ]);
    }

    public function mainConfigPost(Request $request, string $id) {

        $config = MainConfig::where('id',1)->first();

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('files/mainconfig/'.$config->logo));
            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.'.'.$ext;
            $request->file('logo')->move(public_path('files/mainconfig/'),$final_name);
            $config->logo = $final_name;
        }

        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('files/mainconfig/'.$config->favicon));
            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.'.'.$ext;
            $request->file('favicon')->move(public_path('files/mainconfig/'),$final_name);
            $config->favicon = $final_name;
        }

        $config->judul = $request->judul;
        $config->deskripsi = $request->deskripsi;
        $config->kata_kunci = $request->kata_kunci;
        $config->meta_pixel = $request->meta_pixel;

        $config->update();
        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
