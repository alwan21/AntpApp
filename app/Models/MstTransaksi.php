<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'invoice_code',
        'keterangan',
        'total',
        'broadcast',
        'status',
        'batal',
        'user_id',
    ];
}
