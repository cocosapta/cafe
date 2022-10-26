<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DapurController;
use App\Http\Controllers\Controller;
use App\Http\Livewire\ProducIndex;
use Spatie\LaravelIgnition\Support\LivewireComponentParser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('menu.ikan');
// });
// Route::get('/', function () {
//     return view('layouts.meja_layout');
// });
// Route::controller(Livewire\ProducIndex::class)->group(function (){

// });
// Route::get('/',ProducIndex::class)->name('produk');
Route::group(['middleware' => ['auth']], function () {
    //  <----------------Route Meja-------------------------->
    Route::middleware(['auth', 'level:meja'])->group(function () {
        Route::controller(MejaController::class)->group(function () {
            route::get('/', 'index')->name('/');
            route::post('store/{id}', 'store');
            route::get('menu.order', 'menu_order')->name('menu.order');
            route::get('menu.drinks', 'menu_drinks')->name('menu.drinks');
            route::get('menu.food', 'menu_food')->name('menu.food');
            route::get('menu.coffe', 'menu_coffe')->name('menu.coffe');
            route::get('menu.cake', 'menu_cake')->name('menu.cake');
            route::get('menu.snack', 'menu_snack')->name('menu.snack');
            route::get('menu.cart', 'cart')->name('menu.cart');
            route::post('order', 'order');
            route::get('order.hapus/{id}', 'order_hapus');
            route::get('checkout', 'checkout');
            route::post('order.tambah/{id}', 'order_tambah');
            route::post('order.checkout/{nama_pengguna}', 'order_checkout');
            // route::get('/', 'index')->name('/');
            // route::get('menu.order', 'menu_order')->name('menu.order');
            // route::get('tambah.order', 'order_tambah');
            // route::get('checkout', 'checkout')->name('checkout');
            // route::get('checkout.hapus/{id}', 'checkout_hapus')->name('checkout.hapus');
            // route::get('checkout.edit/{id}', 'checkout_edit')->name('checkout.edit');
            // route::post('login/off', 'masuk_order')->name('login.order');
            // route::get('menu.order/{id}', 'order')->where("id", "[0-9]+");
            // route::get('menu/hapus/{id}', 'order_hapus')->where("id", "[0-9]+");
        });
    });
    // <-------------------Route Admin----------------------------->
    Route::middleware(['auth', 'level:admin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            route::get('admin.dashboard', 'index')->name('admin.home');
            route::get('admin.menu', 'menu')->name('admin.menu');
            route::get('admin.galery', 'galery')->name('admin.galery');
            route::get('user', 'user')->name('admin.user');
            route::get('user.delete/{id}', 'user_delete');
            route::get('kategori', 'kategori')->name('sistem.kategori');
            route::get('hapus/{id}', 'hapus');
            route::get('galery.hapus/{id}', 'galery_hapus');
            route::get('lain', 'lain');
            route::get('seo', 'seo')->name('seo');
            route::get('system', 'system')->name('system');
            route::get('general', 'general')->name('general');
            route::get('data.menu', 'data_menu')->name('data.menu');
            // ----------post------------------
            route::post('seo.edit/{id}', 'seo_edit')->name('seo.edit');
            route::post('general.edit/{id}', 'general_edit')->name('general.edit');
            route::post('about.edit/{id}', 'about_edit');
            route::post('hari.edit/{id}', 'hari_edit')->name('hari.edit');
            route::post('user.edit/{id}', 'user_edit');
            route::post('user.post', 'user_post');
            route::post('add', 'up')->name('admin.add');
            route::post('edit/{id}', 'edit')->name('admin.edit');
            route::post('galery.add', 'post')->name('galery.add');
            route::post('galery.edit/{id}', 'galery_edit')->name('galery.edit');
        });
    });
    // <----------------Route Kasir-------------------------->
    Route::middleware(['auth', 'level:kasir'])->group(function () {
        Route::controller(KasirController::class)->group(function () {
            route::get('dashboard', 'index');
            route::get('kasir', 'kasir');
            route::get('pembayaran/{id}', 'pembayaran');
            route::get('menu.cek', 'menu')->name('kasir.menu');
            route::get('order.on', 'order_on')->name('order.on');
            route::get('reservasi.hapus/{id_booking}', 'reservasi_hapus')->name('reservasi.hapus');
            route::post('status/{id}', 'status')->name('status');
            route::post('status.order/{id}', 'status_order')->name('status');
        });
    });
    // <----------------Route Dapur-------------------------->
    Route::middleware(['auth', 'level:dapur'])->group(function () {
        Route::controller(DapurController::class)->group(function () {
            route::get('dapur', 'index');
            route::get('acc', 'acc');
            route::post('acc.s/{id}', 'acc_post');
        });
    });
});
Route::controller(Controller::class)->group(function () {
    route::get('index', 'index')->name('index');
    route::get('about', 'about');
    route::get('contact', 'contact');
    route::get('gallery', 'galery');
    route::get('menu', 'menu');
    route::get('reservasi', 'reservasi');
    route::get('nota', 'nota')->name('nota');
    route::post('reservasi.post', 'reservasi_post');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
