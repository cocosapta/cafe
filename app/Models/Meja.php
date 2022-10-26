<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table='meja';
    protected $guarded = ['id'];
    public function order()
    {
        return $this->hesMany(Order::class);
    }
}
