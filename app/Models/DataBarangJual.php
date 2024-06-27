<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarangJual extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_barang',
        'kode_satuan',
        'harga_beli',
        'active',
    ];
}
