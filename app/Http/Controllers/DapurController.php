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

class DapurController extends Controller
{
    public function index()
    {
        $t = SistemTampilan::all();
        $user = auth()->user();
        $o = Order::join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'order.id', 'order.meja', 'order.nama_pengguna', 'order.total', 'order.status_order')
            ->get();
        return view('dapur.index', compact('user', 't', 'o'));
    }
    public function acc()
    {
        $t = SistemTampilan::all();
        $user = auth()->user();
        $o = Order::join('menu', 'menu.id', '=', 'order.id_menu')
            ->select('menu.nama', 'order.id', 'order.meja', 'order.nama_pengguna', 'order.total', 'order.status_order')
            ->get();
        return view('dapur.acc', compact('user', 't', 'o'));
    }
    public function acc_post(Request $request, $id)
    {
        $order = Order::find($id);
        $order = $request->all();
        Order::where(['id' => $id])->update([
            'status_order' => $order['s'],
        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
}
