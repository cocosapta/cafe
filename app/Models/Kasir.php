<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table='kasir';
    protected $guarded = ['id'];
    public function order()
    {
        return $this->hesMany(Order::class);
    }
}
