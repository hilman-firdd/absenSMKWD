<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenGaji extends Model
{
    use HasFactory;
    protected $table = "komponen_gaji";
    protected $primaryKey ="kode_komponen";
    public $incrementing = false;
}
