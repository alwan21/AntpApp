<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'group_barang',
        'active',
    ];
}