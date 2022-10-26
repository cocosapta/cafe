<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapur extends Model
{
    protected $table='dapur';
    protected $guarded = ['id'];
    public function order(){
        return $this->belongsTo(Order::class);
    }
}