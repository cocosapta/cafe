<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class menu extends Model
{
    protected $table = 'menu';
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hesMany(Order::class);
    }
    static function detail_menu($id){
        $data = menu::where('id', $id)->first();
        return $data;
    }
    static function list_menu(){
        $data = menu::all();
        return $data;
    }
}
