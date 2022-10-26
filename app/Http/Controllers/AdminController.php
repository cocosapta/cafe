<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\SistemTampilan;
use App\Models\SistemAbout;
use App\Models\SistemGalery;
use App\Models\SistemOpen;
use App\Models\SEO;
use Illuminate\Console\View\Components\Warn;
use App\Models\Order;

class AdminController extends Controller
{

    public function index()
    {
        $m = menu::latest()->paginate(5);
        $t = SistemTampilan::all();
        $user = auth()->user();
        $to = Order::count();
        $o = Order::where('status_order', 's')->count();
        $ot = Order::where('checkout', 'sudah')->count();
        $tm = menu::count();
        $mi = menu::where('kategori', 'drinks')->count();
        $co = menu::where('kategori', 'coffe')->count();
        $sn = menu::where('kategori', 'snack')->count();
        $ca = menu::where('kategori', 'cake')->count();
        $fo = menu::where('kategori', 'food')->count();

        return view('admin.dashboard', compact('t', 'ot', 'to', 'o', 'tm', 'mi', 'fo', 'ca', 'co', 'sn','m'));
    }
    public function galery()
    {
        $t = SistemTampilan::all();
        $user = auth()->user();
        $g = SistemGalery::all();
        return view('admin.galery', compact('t', 'g'));
    }
    public function user()
    {
        $t = SistemTampilan::all();
        $user = User::all();
        return view('admin.tambah_user', compact('user', 't'));
    }
    public function lain()
    {
        $t = SistemTampilan::all();
        $user = User::all();
        return view('admin.lain', compact('user', 't'));
    }
    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('destroy', 'Data Success di hapus');
    }
    public function user_edit(Request $request, $id)
    {
        $item = $request->all();
        User::where(['id' => $id])->update([
            'name' => $item['name'],
            'level' => $item['level'],
            'email' => $item['email'],
        ]);
        return back()->with('success', 'Data Success di hapus');
    }
    public function user_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|min:5|max:255'

        ]);
        $user = User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function menu()
    {
        $t = SistemTampilan::all();
        $m = menu::latest()->paginate(5);
        return view('admin.menu', compact('m', 't'));
    }
    public function data_menu()
    {
        $t = SistemTampilan::all();
        $m = menu::latest()->get();
        return view('admin.data', compact('m', 't'));
    }
    public function up(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'description' => 'required|max:255',
            'harga' => 'required|integer',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'kategori' => 'required|max:255',

        ]);
        $menu = menu::create([
            'nama' => $request->nama,
            'description' => $request->description,
            'photo' => $request->file('photo')->store('menu'),
            'kategori' => $request->kategori,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.menu')->with('success', 'Data Successfully');
    }
    public function post(Request $request)
    {

        $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        $galery = SistemGalery::create([
            'cerita' => $request->cerita,
            'gambar' => $request->file('gambar')->store('menu'),
            'tgl' => $request->tgl,
        ]);

        return redirect()->route('admin.galery')->with('success', 'Data Successfully');
    }
    public function hapus($id)
    {
        $menu = menu::find($id);
        if ($menu->photo) {
            Storage::delete($menu->photo);
        }
        $menu->delete();
        return back()->with('destroy', 'Data Successfully');
    }
    public function galery_hapus($id)
    {
        $g = SistemGalery::find($id);
        if ($g->gambar) {
            Storage::delete($g->gambar);
        }
        $g->delete();
        return back()->with('destroy', 'Data Successfully');
    }
    public function edit(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required',
            'description' => 'required|max:255',
            'harga' => 'required|integer',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'kategori' => 'required|max:255',

        ]);
        if ($request->photo <> "") {
            $item = $request->all();
            menu::where(['id' => $id])->update([
                'nama' => $item['nama'],
                'description' => $item['description'],
                'harga' => $item['harga'],
                'photo' => $request->file('photo')->store('menu'),
                'kategori' => $item['kategori']

            ]);

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
        } else {
            $item = $request->all();
            menu::where(['id' => $id])->update([
                'nama' => $item['nama'],
                'description' => $item['description'],
                'harga' => $item['harga'],
                'kategori' => $item['kategori']

            ]);
        }
        return redirect()->route('admin.menu')->with('success', 'Data Successfully');
    }
    public function galery_edit(Request $request, $id)
    {

        $request->validate([
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);
        if ($request->gambar <> "") {
            $item = $request->all();
            SistemGalery::where(['id' => $id])->update([
                'cerita' => $item['cerita'],
                'tgl' => $item['tgl'],
                'gambar' => $request->file('gambar')->store('menu')

            ]);

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
        } else {
            $item = $request->all();
            SistemGalery::where(['id' => $id])->update([
                'cerita' => $item['cerita'],
                'tgl' => $item['tgl']

            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function system()
    {
        $t = SistemTampilan::all();
        $o = SistemOpen::all();
        $a = SistemAbout::all();
        return view('admin.setting.system', compact('o', 'a', 't'));
    }
    public function about_edit(Request $request, $id)
    {
        if ($request->gambar <> "") {
            SistemAbout::where(['id' => $id])->update([
                'gambar' => $request->file('gambar')->store('menu'),
                'diskripsi' => $request['diskripsi'],
                'story' => $request['story'],
                'diskripsi_s' => $request['diskripsi_s'],
                'story_s' => $request['story_s'],

            ]);
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
        } else {
            SistemAbout::where(['id' => $id])->update([
                'story' => $request['story'],
                'diskripsi' => $request['diskripsi'],
                'diskripsi_s' => $request['diskripsi_s'],
                'story_s' => $request['story_s'],

            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function hari_edit(Request $request, $id)
    {
        $item = $request->all();
        SistemOpen::where(['id' => $id])->update([
            'jam' => $item['jam'],
            'tutup' => $item['tutup']

        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function seo()
    {
        $t = SistemTampilan::all();
        $s = SEO::all();
        return view('admin.setting.seo', compact('s', 't'));
    }
    public function seo_edit(Request $request, $id)
    {
        $item = $request->all();
        SEO::where(['id' => $id])->update([
            'ig' => $item['ig'],
            'fb' => $item['fb'],
            'tw' => $item['tw'],
            'web' => $item['web'],

        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function general()
    {
        $t = SistemTampilan::all();
        return view('admin.setting.general', compact('t'));
    }
    public function general_edit(Request $request, $id)
    {

        if ($request->logo <> "" && $request->icon <> "") {
            $item = $request->all();
            SistemTampilan::where(['id' => $id])->update([
                'title' => $item['title'],
                'phone' => $item['phone'],
                'logo' => $request->file('logo')->store('menu'),
                'icon' => $request->file('icon')->store('menu'),
                'email' => $item['email'],
                'lokasi' => $item['lokasi'],
                'lokasi_s' => $item['lokasi_s'],

            ]);
            if ($request->oldlogo && $request->oldicon) {
                Storage::delete($request->oldlogo);
                Storage::delete($request->oldicon);
            }
        } elseif ($request->logo <> "") {
            $item = $request->all();
            SistemTampilan::where(['id' => $id])->update([
                'title' => $item['title'],
                'phone' => $item['phone'],
                'logo' => $request->file('logo')->store('menu'),
                'email' => $item['email'],
                'lokasi' => $item['lokasi'],
                'lokasi_s' => $item['lokasi_s'],

            ]);
            if ($request->oldlogo) {
                Storage::delete($request->oldlogo);
            }
        } elseif ($request->icon <> "") {
            $item = $request->all();
            SistemTampilan::where(['id' => $id])->update([
                'title' => $item['title'],
                'phone' => $item['phone'],
                'icon' => $request->file('icon')->store('menu'),
                'email' => $item['email'],
                'lokasi' => $item['lokasi'],
                'lokasi_s' => $item['lokasi_s'],

            ]);
            if ($request->oldicon) {
                Storage::delete($request->oldicon);
            }
        } else {
            $item = $request->all();
            SistemTampilan::where(['id' => $id])->update([
                'title' => $item['title'],
                'phone' => $item['phone'],
                'email' => $item['email'],
                'lokasi' => $item['lokasi'],

            ]);
        }
        return redirect()->back();
    }
}
