<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemTampilan extends Model
{
    protected $table = 'sistem_tampilan';
    protected $guarded = ['id_booking'];
}
