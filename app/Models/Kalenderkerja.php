<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalenderkerja extends Model
{
    use HasFactory;
    protected $table = "kalender_kerja";   
    protected $guarded = [];

    public function getTanggalAttribute($value)
    {
        return date_format(date_create($value),"d-m-Y");

    }
}
