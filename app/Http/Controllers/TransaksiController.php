<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Merek;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = transaksi::latest()->paginate(5);
        return view('transaksis.index',compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merek = Merek::all();
        $barang = Barang::all();
        return view('transaksis.create',compact('merek','barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate([
        //'nama_barang' => 'required',
        //'harga_barang' => 'required',
        //'stok' => 'required',
        //'total_harga' => 'required',
        //'total_bayar' => 'required',
        //'kembalian' => 'required',
        //'tanggal_beli' => 'required',
        //]);
        $find_barang = Barang::where('nama_barang', $request->nama_barang)->first();
        if ($request->stok <= $find_barang->stok) {
            if ($request->total_bayar >= ($request->stok * $find_barang->harga_barang)) {
                $cek = Transaksi::create([
                    'nama_barang' => $request->nama_barang ,
                    'harga_barang' => $find_barang->harga_barang ,
                    'stok' => $request->stok,
                    'total_harga' => $request->stok * $find_barang->harga_barang,
                    'total_bayar' => $request->total_bayar,
                    'kembalian' => $request->total_bayar - $request->stok * $find_barang->harga_barang,
                    'tanggal_beli' => Carbon::now() ,
                ]);
                DB::table('barangs')->where('nama_barang', $request->nama_barang)->update(['stok' => $find_barang->stok - $request->stok]);
            }else{
                return redirect()->back()->with('error', 'Uang tidak cukup untuk membeli');
            }
        }else{
            return redirect()->back()->with('error', 'stok tidak cukup');
        }
        return redirect()->route('transaksis.index')
        ->with('success','transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $merek = Merek::all();
        $barang = Barang::all();
        return view('`transaksis.edit',compact('transaksi','merek','barang'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
        'nama_barang' => 'required',
        'harga_barang' => 'required',
        'stok' => 'required',
        'total_harga' => 'required',
        'total_bayar' => 'required',
        'kembalian' => 'required',
        'tanggal_beli' => 'required',
        ]);
        $transaksi->update($request->all());
        return redirect()->route('transaksis.index')
        ->with('success','transaksi updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksis.index')
        ->with('success','transaksi deleted successfully');

    }
    public function getHarga(Request $request)
    {
    $hargas['nama_barang'] = Barang::where('nama_barang', $request->nama_barang)
    ->first();

    return response()->json([
    'hargas' => $hargas,
    ]);
    }
}
