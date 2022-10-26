<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\menu;
use App\Models\Kode;
use App\Models\Order;
use Spatie\LaravelIgnition\Support\LivewireComponentParser;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\SistemTampilan;
use App\Models\Kasir;

class MejaController extends Controller
{
    public function index()
    {
        $t = SistemTampilan::all();
        $user = auth()->user();
        return view('menu.login', compact('user', 't'));
    }
    public function menu_order()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::all();
        $user = auth()->user();
        $order = Order::where('nama_pengguna', Auth::user()->customer)->where('checkout', 'belum')->count();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna', 'order.checkout')
            ->get();
        return view('menu.dashboard', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_drinks()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'drinks')->get();
        $user = auth()->user();
        $order = Order::where('nama_pengguna', Auth::user()->customer)->count();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna')
            ->get();
        return view('menu.drink', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_food()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'food')->get();
        $user = auth()->user();
        $order = Order::where('nama_pengguna', Auth::user()->customer)->count();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna')
            ->get();
        return view('menu.drink', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_cake()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'cake')->get();
        $user = auth()->user();
        $order = Order::where('nama_pengguna', Auth::user()->customer)->count();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna')
            ->get();
        return view('menu.drink', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_coffe()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'coffe')->get();
        $user = auth()->user();
        $order = Order::where('nama_pengguna', Auth::user()->customer)->count();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna')
            ->get();
        return view('menu.drink', compact('m', 'order', 'o', 'user', 't'));
    }
    public function menu_snack()
    {
        // dd(session("cart"));
        $t = SistemTampilan::all();
        $m = menu::where('kategori', 'snack')->get();
        $user = auth()->user();
        $order = Order::where('nama_pengguna', Auth::user()->customer)->count();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna')
            ->get();
        return view('menu.drink', compact('m', 'order', 'o', 'user', 't'));
    }
    public function store(Request $request, $id)
    {
        $item = $request->all();
        User::where(['id' => $id])->update([
            'customer' => $item['customer']
        ]);
        $user = auth()->user();
        Kasir::create([
            'nama' => $request->customer,
            'meja' => $user->name,
            'tgl' => date("Y-m-d"),
        ]);
        return redirect()->route('menu.order');
    }
    public function order(Request $request)
    {

        $user = auth()->user();
        $order = Order::all();
        Order::create([
            'id_menu' => $request->id_menu,
            'nama_pengguna' => $user->customer,
            'meja' => $user->name,
            'total' => $request->total,
        ]);
        return redirect()->back();
    }
    public function order_hapus($id)
    {
        $order = Order::find($id);
        $order->delete();
        return back();
    }
    public function order_tambah(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where(['id' => $id])->update([
            'total' => $request->total,

        ]);
        return back();
    }
    public function order_checkout(Request $request, $nama_pengguna)
    {
        Order::where(['nama_pengguna' => $nama_pengguna])->update([
            'checkout' => 'sudah',

        ]);
        return redirect()->route('menu.cart');
    }
    public function checkout()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
        $user = auth()->user();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna', 'order.total', 'order.checkout')
            ->get();

        return view('menu.checkout', compact('m', 'o', 'user', 't'));
    }
    public function cart()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
        $user = auth()->user();
        $o = Order::where('nama_pengguna', Auth::user()->customer)->join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna', 'order.total')
            ->get();
        return view('menu.cart', compact('m', 'o', 'user', 't'));
    }
    // $posts = Post::with('user')->where('user_id', Auth::user()->id)->firstOrFail();
    // return view('dashboard', ['posts' => $posts]);
    //dashboard.blade.php
    // @foreach ($posts as $post)
    //   <div class="p-6 bg-white border-b border-gray-200">
    //      <h1 class="text-2xl">{{ $post->title }}</h1>
    //      <p>by {{ $post->user->name }}</p>
    //   </div>
    // @endforeach
}
