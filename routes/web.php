<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PDFController;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
// use DataTables;

Route::get('/', [LoginController::class,'index']  ) -> middleware('guest');
Route::get('/signin', [LoginController::class,'index']  ) -> name('login') -> middleware('guest');
Route::post('/signin', [LoginController::class,'authenticate']  ) -> name('login.authenticate');
Route::get('/signup',[LoginController::class,'signup']  ) -> name('login.signup') -> Middleware('guest');
Route::post('/signup',[LoginController::class,'store']  ) -> name('login.store');
Route::post('/signout',[LoginController::class,'signout']  ) -> name('login.signout') -> middleware('auth');
Route::get('/dashboard',[LoginController::class,'dashboard']  ) -> middleware('auth');

Route::get('/databarang',[BarangController::class,'databarang']) ->name('databarang') -> middleware('auth');
Route::post('/databarang', [BarangController::class,'inputbarang']  ) -> name('databarang.input') -> middleware('auth');
Route::get('/databarang/{id}', [BarangController::class,'editbarang']  ) -> name('databarang.edit') -> middleware('auth');
Route::put('/databarang/{id}', [BarangController::class,'updatebarang']  ) -> name('databarang.update') -> middleware('auth');
Route::delete('/databarang/{id}', [BarangController::class,'deletebarang']  ) -> name('databarang.delete') -> middleware('auth');

Route::get('/pengeluaran',[PengeluaranController::class,'index']  ) -> name('pengeluaran') -> middleware('auth');
Route::post('/pengeluaran', [PengeluaranController::class,'store']  ) -> name('pengeluaran.store') -> middleware('auth');
Route::delete('/pengeluaran/{id}', [PengeluaranController::class,'delete']  ) -> name('pengeluaran.delete') -> middleware('auth');
Route::get('/pengeluaran/{id}', [PengeluaranController::class,'edit']  ) -> name('pengeluaran.edit') -> middleware('auth');
Route::put('/pengeluaran/{id}', [PengeluaranController::class,'update']  ) -> name('pengeluaran.update') -> middleware('auth');

Route::get('/pemasukan',[PemasukanController::class,'index']  ) -> name('pemasukan') -> middleware('auth');
Route::post('/pemasukan', [PemasukanController::class,'store']  ) -> name('pemasukan.store') -> middleware('auth');
Route::delete('/pemasukan/{id}', [PemasukanController::class,'delete']  ) -> name('pemasukan.delete') -> middleware('auth');
Route::get('/pemasukan/{id}', [PemasukanController::class,'edit']  ) -> name('pemasukan.edit') -> middleware('auth');
Route::put('/pemasukan/{id}', [PemasukanController::class,'update']  ) -> name('pemasukan.update') -> middleware('auth');

Route::get('/transaksi',[TransaksiController::class,'index']  ) -> name('transaksi') -> middleware('auth');
Route::post('/transaksi', [TransaksiController::class,'store']  ) -> name('transaksi.store') -> middleware('auth');
// Route::delete('/transaksi/{id}', [TransaksiController::class,'delete']  ) -> name('transaksi.delete') -> middleware('auth');
Route::get('/transaksi/{id}', [TransaksiController::class,'edit']  ) -> name('transaksi.edit') -> middleware('auth');
Route::put('/transaksi/{id}', [TransaksiController::class,'update']  ) -> name('transaksi.update') -> middleware('auth');

Route::get('/datauser',[UserController::class,'index']  ) -> name('datauser') -> middleware('auth');
Route::post('/datauser', [UserController::class,'store']  ) -> name('datauser.store') -> middleware('auth');
Route::delete('/datauser/{id}', [UserController::class,'delete']  ) -> name('datauser.delete') -> middleware('auth');
Route::get('/datauser/{id}', [UserController::class,'edit']  ) -> name('datauser.edit') -> middleware('auth');
Route::put('/datauser/{id}', [UserController::class,'update']  ) -> name('datauser.update') -> middleware('auth');

Route::get('/pdfinvoice/{id}-{name}', [PDFController::class,'viewInvoice']  ) -> name('pdfinvoice') -> middleware('auth');

Route::get('/history', [HistoryController::class,'index']  ) -> name('history') -> middleware('auth');

Route::get('/reports', function () {
    return view('reports',[
        'title' => 'Reports'
    ]);
});

Route::get('/history', function () {
    return view('history',[
        'title' => 'History'
    ]);
});