<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'nama_barang',
        'keterangan',
        'harga',
        'qty',
        'total',
        'batal',
        'user_id',

    ];
}
