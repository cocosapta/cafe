<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\menu;

class Order extends Model
{
    protected $table='order';
    protected $guarded = ['id'];
    public function menu(){
        return $this->belongsTo(menu::class);
    }
    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }
    static function tambah_order($id_cart,$total,$meja ,$id_menu){
        Order::create([
            "id_cart" => $id_cart,
            "id_menu" => $id_menu,
            "meja" => $meja,
            "total" => $total,
        ]);
    }
}
