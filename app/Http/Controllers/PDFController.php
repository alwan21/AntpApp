<?php

namespace App\Http\Controllers;

use App\Models\MstTransaksi;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function viewInvoice($id, $name){
        $data = MstTransaksi::find($id);
        $data = $data->join('users', 'users.id', '=', 'mst_transaksis.user_id')
                ->select('mst_transaksis.*', 'users.name')->first();
        return view('pdfinvoice',[
            'title' => 'pdfinvoice',
            'name' => $name,
            'data' => $data
        ]);
       
    }
}
