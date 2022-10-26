<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemAbout extends Model
{
    protected $table = 'sistem_about';
    protected $guarded = ['id_booking'];
}
