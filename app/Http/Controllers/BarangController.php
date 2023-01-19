<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\distributor;
use Illuminate\Http\Request;
use App\Models\merek;

class BarangController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {

        $barangs = Barang::latest()->paginate(5);
        return view('barangs.index',compact('barangs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama_merek = merek::all();
        $nama_distributor = distributor::all();
        return view('barangs.create',compact('nama_merek','nama_distributor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
        ]);
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'nama_merek' => $request->nama_merek,
            'nama_distributor' => $request->nama_distributor,
            'harga_barang' => $request->harga_barang,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'tgl_masuk' => $request->tgl_masuk,
            'nama_petugas' => auth()->user()->name,
        ]);
        return redirect()->route('barangs.index')
        ->with('success','Barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barangs.show',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
    $nama_merek = merek::all();
    $nama_distributor = distributor::all();
    return view('barangs.edit',compact('barang','nama_merek','nama_distributor')); }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        ([
        'nama_barang' => $request->nama_barang,
        'nama_merek' => $request->nama_merek,
        'nama_distributor' => $request->nama_distributor,
        'harga_barang' => $request->harga_barang,
        'harga_beli' => $request->harga_beli,
        'stok' => $request->stok,
        'tgl_masuk' => $request->tgl_masuk,
        'nama_petugas' => auth()->user()->name,
        ]);
        $barang->update($request->all());
        return redirect()->route('barangs.index')
        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')
        ->with('success','Barang deleted successfully');
    }
}
