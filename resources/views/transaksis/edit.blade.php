@extends('transaksis.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit transaksi</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('transaksis.update',$transaksi->id) }}" method="POST">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Barang:</strong>
<select name="nama_barang" class="form-control">
    @foreach ($barang as $ml)
    <option value ="{{ $ml->nama_barang }}" @if ($ml->nama_barang == $transaksi->nama_barang ) selected @endif>{{ $ml->nama_barang }}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga Barang:</strong>
<select name="harga_barang" class="form-control">
    <option value=""> Pilih Harga Barang</option>
    @foreach ($barang as $ml)
    <option value ="{{ $ml->harga_barang }}" @if ($ml->harga_barang == $transaksi->harga_barang ) selected @endif>{{ $ml->harga_barang }}</option>
    @endforeach
</select></div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total Barang:</strong>
<input type="integer" name="stok" value="{{ $transaksi->stok }}" class="form-control" placeholder="Total Barang">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total Harga:</strong>
<input type="integer" name="total_harga" value="{{ $transaksi->total_harga }}" class="form-control" placeholder="Total Harga">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total Bayar:</strong>
<input type="integer" name="total_bayar" value="{{ $transaksi->total_bayar }}" class="form-control" placeholder="Total Bayar">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Kembalian:</strong>
<input type="integer" name="kembalian" value="{{ $transaksi->kembalian }}" class="form-control" placeholder="kembalian">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tanggal Beli:</strong>
<input type="date" name="tanggal_beli" value="{{ $transaksi->tanggal_beli }}" class="form-control" placeholder="Tanggal Beli">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ubah data {{$transaksi->nama_barang}} ?')">Submit</button>
</div>
</div>
</form>
@endsection
