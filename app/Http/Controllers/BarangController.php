<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataBarangJual;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class BarangController extends Controller
{
    //
  

    public function databarang(Request $request)
    {
        $data = DataBarang::select('*');
        if($request->ajax()){
            return datatables()->of($data)->addIndexColumn()->make(true);
        }
        return view('databarang',[
            'title' => 'Data Barang',
            'total_users' => count($data->get())
        ]);
    }

    public function inputbarang(Request $request)
    {
        
        $data_barang = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'group_barang' => $request->group_barang,
            'active' => $request->active ? 1 : 0
        ];
        $data_barang_jual = [
            'kode_barang' => $request->kode_barang,
            'kode_satuan' => $request->kode_satuan,
            'harga_beli' => $request->harga_beli,
            'active' => $request->active ? 1 : 0
        ];
        DataBarang::create($data_barang);
        DataBarangJual::create($data_barang_jual);
        return redirect('/databarang')->with('success', 'Data Berhasil Diinput');
    }

    public function deletebarang($id)
    {   
        $data = DataBarang::find($id);
        if($data){
            $data_jual = DataBarangJual::where('kode_barang', $data->kode_barang)->delete();
            $data->delete();
            return response()->json(['message' => 'Data Berhasil Dihapus']);
        }else{
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }
    }

    public function editbarang($id)
    {
        $data = DataBarang::find($id);
        $data2 = DataBarangJual::where('kode_barang', $data->kode_barang)->first();
        $data2Array = $data2->toArray();
        $data2Array['active_satuan'] = $data2['active']; 
        unset($data2Array['active']);
        $data_fix = array_merge($data->toArray(),$data2Array);
        if($data){
            return response()->json($data_fix);
        }else{
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }
    }

    public function updatebarang(Request $request)
    {
        $id = $request->id;
        $data = DataBarang::find($id);
        $data->update($request->all());
        return response()->json(['message' => $request->all()]);;
    }
    public function transaksi()
    {
        return view('transaksi',[
            'title' => 'Transaksi'
        ]);
    }
}
