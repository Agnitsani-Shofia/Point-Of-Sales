<?php
//ini adalah controller siswa
Use App\Http\Controllers\SiswaController;

// ini adalah controller produk
Use App\Http\Controllers\ProductController;

// ini adalah controller rombel
Use App\Http\Controllers\RombelController;

// ini adalah controller rayon
Use App\Http\Controllers\RayonController;

// ini adalah controller merek
Use App\Http\Controllers\MerekController;

// ini adalah controller distributor
Use App\Http\Controllers\DistributorController;

// ini adalah controller barang
Use App\Http\Controllers\BarangController;

// ini adalah controller transaksi
Use App\Http\Controllers\TransaksiController;

// ini adalah controller login
Use App\Http\Controllers\SessionController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\RegisterController;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view('index');
});
    
Route::get('/transaksis', function () {
return view('index');
});

Route::get('/login', function () {
return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::resource('products', ProductController::class);
// ini adalah route produk

Route::resource('siswas', SiswaController::class);
//ini adalah route siswa

Route::resource('rombels', RombelController::class);
//ini adalah route rombel

Route::resource('rayons', RayonController::class);
//ini adalah route rayon

Route::resource('mereks', MerekController::class);
//ini adalah route merek

Route::resource('distributors', DistributorController::class);
//ini adalah route distributor

Route::resource('barangs', BarangController::class);
//ini adalah route barang

Route::resource('transaksis', TransaksiController::class);
//ini adalah route transaksi
Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
