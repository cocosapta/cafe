<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemOpen extends Model
{
    protected $table = 'sistem_opening';
    protected $guarded = ['id_booking'];
}
