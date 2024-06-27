<?php

namespace App\Http\Controllers;

use App\Models\MstPengeluaran;
use App\Models\User;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    
    public function index(Request $request)
    {

        
        if($request->ajax()){
            $data = MstPengeluaran::select('*')
                    -> join('users', 'users.id', '=', 'mst_pengeluarans.user_id')
                    -> select('mst_pengeluarans.*', 'users.name');
            // $data = $data->join('users', 'users.id', '=', 'mst_pengeluaran.user_id');
             if($request->has('month') && $request->input('month') != null){
                $month = $request->input('month');
                $year = substr($month, 0, 4);
                $month = substr($month, 5, 2);
                $data = $data->whereMonth('tanggal', $month);
                $data = $data->whereYear('tanggal', $year);
            }
            
            return datatables()->of($data)->addIndexColumn()->make(true);
        }

        $dataTotal = $this->SearchDataTotal(MstPengeluaran::class);
        $TotalHariIni = $dataTotal['total_hari_ini'];
        $Selisih = $dataTotal['selisih'];
        $TotalBulanIni = $dataTotal['total_bulan_ini'];
        $SelisihBulan = $dataTotal['selisih_bulan'];
        $TotalAll = $dataTotal['total_all'];
        $customers =$dataTotal['customers'];

        return view('pengeluaran',[
            'title' => 'Pengeluaran',
            'selisih' => $Selisih,
            'total_hari_ini' => $TotalHariIni,
            'selisih_bulan' => $SelisihBulan,
            'total_bulan_ini' => $TotalBulanIni,
            'total_all' => $TotalAll,
            'customers' => $customers
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['total'] = $data['qty'] * $data['harga'];
        $data['batal'] = 0;
        $dataTotal = $this->SearchDataTotal(MstPengeluaran::class);
        MstPengeluaran::create($data);        
        return response()->json([
            'message' => 'Data Berhasil Ditambahkan',
            'DataTotal' => $dataTotal
        ]);
    }

    public function delete($id)
    {
        $data = MstPengeluaran::find($id);
        $dataTotal = $this->SearchDataTotal(MstPengeluaran::class);
        if($data){
            $data->delete();
            return response()->json([
                'message' => 'Data Berhasil Dihapus',
                'DataTotal' => $dataTotal
            ]);
        }else{
            return response()->json([
                'message' => 'Data Tidak Ditemukan',
                'DataTotal' => $dataTotal
            ]);
        }
    }

    public function edit($id)
    {
        $data = MstPengeluaran::find($id);
        $dataUser = User::find($data->user_id);
        $data['user'] = $dataUser->name;
        if($data){
            return response()->json($data);
        }else{
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $dataRequest = $request->all();
        $dataRequest['user_id'] = auth()->user()->id;
        $dataRequest['total'] = $dataRequest['qty'] * $dataRequest['harga'];
        $dataRequest['updated_at'] = date('Y-m-d H:i:s');
        if(!$request->has('batal')){
            $dataRequest['batal'] = 0;
        }
        $dataRequest['batal'] = $dataRequest['batal'] ? 1 : 0;
        $data = MstPengeluaran::find($id);
        $data->update($dataRequest);
        $dataTotal = $this->SearchDataTotal(MstPengeluaran::class);
        if($data){
            return response()->json([
                'message' => 'Data Berhasil Diupdate',
                'DataTotal' => $dataTotal
            ]);
        }else{
            return response()->json([
                'message' => 'Data Gagal Diupdate',
                'DataTotal' => $dataTotal
            ]);
        }
    }

    public function SearchDataTotal($table) {

        $DataKemarin        = $table::whereDate('tanggal', date('Y-m-d', strtotime('-1 day')))
                            ->where('batal', 0)
                            ->get();
        $DataHariIni        = $table::whereDate('tanggal', date('Y-m-d'))
                            ->where('batal', 0)
                            ->get();
        $DataBulanKemarin   = $table::whereMonth('tanggal', date('m', strtotime('-1 month')))
                            ->where('batal', 0)
                            ->get();
        $DataBulanIni       = $table::whereMonth('tanggal', date('m'))
                            ->where('batal', 0)
                            ->get();
        $DataAll            = $table::where('batal', 0)->get();
        // Selisih Kemarin & Hari Ini
        $Selisih        = $DataHariIni->sum('total') - $DataKemarin->sum('total');
        if($Selisih == 0 || $DataKemarin->sum('total') == 0){
            $Selisih = 100;
        }else{
            $Selisih        = number_format(( $Selisih / $DataKemarin->sum('total')) * 100,2);
        }

        // Selisih Bulan Kemarin & Bulan Ini
        $SelisihBulan        = $DataBulanIni->sum('total') - $DataBulanKemarin->sum('total');
        if($SelisihBulan == 0 || $DataBulanKemarin->sum('total') == 0){
            $SelisihBulan = 100;
        }else{
            $SelisihBulan        = number_format(( $SelisihBulan / $DataBulanKemarin->sum('total')) * 100,2);
        }
        $TotalHariIni   = number_format($DataHariIni->sum('total'),0,',','.');
        $TotalBulanIni  = number_format($DataBulanIni->sum('total'),0,',','.');
        $TotalAll       = number_format($DataAll->sum('total'),0,',','.');

        // Customers
        $customers = User::where(['role' => 'user'])->count();
        return [
            'selisih' => $Selisih,
            'total_hari_ini' => $TotalHariIni,
            'selisih_bulan' => $SelisihBulan,
            'total_bulan_ini' => $TotalBulanIni,
            'total_all' => $TotalAll,
            'customers' => $customers
        ];
    }
}
