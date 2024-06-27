<?php

namespace App\Http\Controllers;

use App\Models\MstTransaksi;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->ajax()){
            $data       = MstTransaksi::select('*');
            $data       = $data-> join('users', 'users.id', '=', 'mst_transaksis.user_id');
            $data       = $data-> select('mst_transaksis.*', 'users.name');
            return datatables()->of($data)->addIndexColumn()->make(true);
        }
        $data_user = User::where([
                        'status' => 1,
                        'role' => 'user'
                    ])->get();
        return view('transaksi',[
            'title' => 'Transaksi',
            'users' => $data_user
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['broadcast'] = 0;
        $data['status'] = 0;
        $data['batal'] = 0;
        MstTransaksi::create($data);
        return response()->json([
            'message' => 'Data Berhasil Ditambahkan',
        ]);
    }

    public function edit($id){
        $data = MstTransaksi::find($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        MstTransaksi::find($id)->update($data);
        return response()->json([
            'message' => 'Data Berhasil Diupdate',
        ]);
    }
}
