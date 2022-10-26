<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SistemAbout;
use App\Models\SistemGalery;
use App\Models\SistemOpen;
use App\Models\SistemTampilan;
use App\Models\SEO;
use App\Models\menu;

class Controller extends BaseController
{
   public function index()
   {
      $m = menu::latest()->paginate(9);
      $a = SistemAbout::all();
      $s = SEO::all();
      $o = SistemOpen::all();
      $g = SistemGalery::all();
      $t = SistemTampilan::all();
      return view('user.dashboard', compact('a', 'g', 'o', 't', 's', 'm'));
   }
   public function reservasi()
   {
      $s = SEO::all();
      $a = SistemAbout::all();
      $o = SistemOpen::all();
      $g = SistemGalery::all();
      $t = SistemTampilan::all();
      return view('user.reservasi', compact('a', 'g', 'o', 't', 's'));
   }
   public function nota()
   {
      $t = SistemTampilan::all();
      $s = SEO::all();
      $r = Reservasi::latest()->paginate(1);
      return view('user.order', compact('r','t'));
   }
   public function reservasi_post(Request $request)
   {
      $request->validate([
         'nama' => 'required',
         'wa' => 'required',
         'tgl' => 'required',
         'orang' => 'required'

      ]);
      $request = $request->all();
      $request = Reservasi::create([
         'nama' => $request['nama'],
         'wa' => $request['wa'],
         'tgl' => $request['tgl'],
         'orang' => $request['orang'],
         'kode' => Str::random(6),
      ]);
      return redirect()->route('nota')->with('success', 'Data Successfully');
   }
   public function hapus_order($id)
   {
   }

   public function menu()
   {
      $f = menu::latest()->paginate(9);
      $s = SEO::all();
      $a = SistemAbout::all();
      $o = SistemOpen::all();
      $g = SistemGalery::all();
      $t = SistemTampilan::all();
      return view('user.menu', compact('a', 'g', 'o', 't', 's','f'));
   }
   public function about()
   {
      $f = menu::latest()->paginate(9);
      $s = SEO::all();
      $a = SistemAbout::all();
      $o = SistemOpen::all();
      $g = SistemGalery::all();
      $t = SistemTampilan::all();
      return view('user.about', compact('a', 'g', 'o', 't', 's','f'));
   }
   public function galery()
   {
      $m = menu::latest()->paginate(9);
      $s = SEO::all();
      $a = SistemAbout::all();
      $o = SistemOpen::all();
      $g = SistemGalery::all();
      $t = SistemTampilan::all();
      return view('user.galery', compact('a', 'g', 'o', 't', 's','m'));
   }
   public function contact()
   {
      $s = SEO::all();
      $a = SistemAbout::all();
      $o = SistemOpen::all();
      $g = SistemGalery::all();
      $t = SistemTampilan::all();
      return view('user.contact', compact('a', 'g', 'o', 't', 's'));
   }
}
