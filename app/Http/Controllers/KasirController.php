<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\Order;
use App\Models\Meja;
use App\Models\SistemTampilan;
use App\Models\Reservasi;
use App\Models\Kasir;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KasirController extends Controller
{

    public function index()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
        return view('kasir.dashboard', compact('m', 't'));
    }
    public function menu()
    {
        $t = SistemTampilan::all();
        $m = menu::all();
        return view('kasir.menu', compact('m', 't'));
    }
    public function kasir()
    {
        $t = SistemTampilan::all();
        $k = Kasir::all();
        $o = Order::join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna', 'order.total', 'order.checkout')
            ->get();
        return view('kasir.kasir', compact('o','k', 't'));
    }
    public function pembayaran()
    {
        $user = auth()->user();
        $t = SistemTampilan::all();
        $k = Kasir::all();
        $o = Order::join('menu', 'menu.id', '=', 'order.id_menu')->join('kasir', 'kasir.id', '=', 'order.id_cart')
            ->select('menu.nama', 'menu.harga', 'menu.description', 'order.id', 'order.id_menu', 'order.nama_pengguna', 'order.total', 'order.checkout')
            ->get();
        return view('kasir.pembayaran', compact('o', 'k', 't'));
    }
    public function status(Request $request, $id)
    {
        $menu = menu::find($id);
        if ($menu->status == 'ready') {
            $menu = $request->all();
            menu::where(['id' => $id])->update([
                'status' => $menu['sold'],
            ]);
        } elseif ($menu->status == 'sold out') {
            $menu = $request->all();
            menu::where(['id' => $id])->update([
                'status' => $menu['ready'],
            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function status_order(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order->status_order == 'acc') {
            $order = $request->all();
            Order::where(['id' => $id])->update([
                'status_order' => $order['cansel'],
            ]);
        } elseif ($order->status_order == 'cansel') {
            $order = $request->all();
            Order::where(['id' => $id])->update([
                'status_order' => $order['acc'],
            ]);
        }
        return redirect()->back()->with('success', 'Data Successfully');
    }
    public function proses(Request $request){
        $kredensial = $request->only('kode', 'nama');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $reservasi = Auth::reservasi();
            /*if ($reservasi->level == '1') {
                return redirect()->intended('admin');
            } elseif ($reservasi->level == '2') {
                return redirect()->intended('beranda');
            } */
            if ($reservasi){
                return redirect()->intended('home');
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nama' => 'Maaf nama atau kode anda salah',
            'kode' => 'Maaf nama atau kode anda salah',
        ])->onlyInput('nama', 'kode');
    }
    // public function kasir(Request $request, $id)
    // {
    //     $order= Order::find($id);
    //     if ($order->status == 'acc') {
    //         $order = $request->all();
    //         order::where(['id' => $id])->update([
    //             'status' => $order['cancel'],
    //         ]);
    //     } elseif ($order->status == 'cancel') {
    //         $order = $request->all();
    //         order::where(['id' => $id])->update([
    //             'status' => $order['acc'],
    //         ]); 
    //     }
    //     return redirect()->back()->with('success', 'Data Successfully');
    // }
    public function order_on()
    {
        $t = SistemTampilan::all();
        $r = Reservasi::all();
        return view('kasir.order_on', compact('r', 't'));
    }
    public function reservasi_hapus($id_booking)
    {
        $order = Reservasi::find($id_booking);
        $order->delete();
        return redirect()->back()->with('success', 'Data Success dihapus');;
    }
}
