<?php

namespace App\Http\Controllers;
use App\Models\MstPemasukan;
use App\Models\User;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    //
    public function index(Request $request )
    {
        if($request->ajax()){
            $data   = MstPemasukan::select('*')
                    -> join('users', 'users.id', '=', 'mst_pemasukans.user_id')
                    -> select('mst_pemasukans.*', 'users.name');

            if($request->has('month') && $request->input('month') != null){
                $month = $request->input('month');
                $year = substr($month, 0, 4);
                $month = substr($month, 5, 2);
                $data = $data->whereMonth('tanggal', $month);
                $data = $data->whereYear('tanggal', $year);
            }
            return datatables()->of($data)->addIndexColumn()->make(true);
        }
        //
        $dataTotal = $this->SearchDataTotal(MstPemasukan::class);
        $TotalHariIni = $dataTotal['total_hari_ini'];
        $Selisih = $dataTotal['selisih'];
        $TotalBulanIni = $dataTotal['total_bulan_ini'];
        $SelisihBulan = $dataTotal['selisih_bulan'];
        $TotalAll = $dataTotal['total_all'];
        $customers =$dataTotal['customers'];
            

        return view('pemasukan',[
            'title' => 'Pemasukan',
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
        if(!$request->has('batal')){
            $data['batal'] = 0;
        }
        MstPemasukan::create($data);    
        $dataTotal = $this->SearchDataTotal(MstPemasukan::class);

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan',
            'DataTotal' => $dataTotal
        ]);
    }

    public function delete($id)
    {
        $detele = MstPemasukan::find($id)->delete();
        $DataTotal = $this->SearchDataTotal(MstPemasukan::class);
        if($detele){
            return response()->json([
                'message' => 'Data Berhasil Dihapus',
                'DataTotal' => $DataTotal
            ]);
        }else{
            return response()->json(['message' => 'Data Tidak Ditemukan']);
        }
    }

    public function edit($id)
    {
        $data = MstPemasukan::find($id);
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
        $dataRequest['updated_at'] = date('Y-m-d H:i:s');
        if(!$request->has('batal')){
            $dataRequest['batal'] = 0;
        }
        $dataRequest['batal'] = $dataRequest['batal'] ? 1 : 0;
        $data = MstPemasukan::find($id);
        $data->update($dataRequest);
        $dataTotal = $this->SearchDataTotal(MstPemasukan::class);
        if($data){
            return response()->json([
                'message' => 'Data Berhasil Diupdate',
                'DataTotal' => $dataTotal
            ]);
        }else{
            return response()->json(['message' => 'Data Gagal Diupdate']);
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
