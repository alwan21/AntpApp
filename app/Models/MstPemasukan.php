<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPemasukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'keterangan',
        'total',
        'batal',
        'user_id',

    ];
}
