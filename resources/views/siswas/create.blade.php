@extends('siswas.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left"><br>
<h2>Add New Siswa</h2>
</div>
<div class="pull-right"><br>
<a class="btn btn-primary" href="{{ route('siswas.index') }}"> Back</a>
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
<form action="{{ route('siswas.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>NIS:</strong>
<input type="number" min="0" name="nis" class="form-control" placeholder="NIS">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama:</strong>
<input type="text" name="nama" class="form-control" placeholder="Nama">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Rombel:</strong>
<select name="rombel" class="form-control">
    <option value""> Pilih Rombel</option>
    @foreach ($rombel as $id)
    <option value ="{{ $id->rombel }}">{{ $id->rombel }}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Rayon:</strong>
<select name="rayon" class="form-control">
    <option value""> Pilih Rayon</option>
    @foreach ($rayon as $id)
    <option value ="{{ $id->nama_rayon }}">{{ $id->nama_rayon }}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-success">Submit</button>
</div>
</div>
</form>
@endsection