<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemGalery extends Model
{
    protected $table = 'sistem_galery';
    protected $guarded = ['id_booking'];
}
