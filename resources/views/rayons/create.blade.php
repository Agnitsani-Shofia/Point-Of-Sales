@extends('rayons.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                    <h2>Add New Rayon</h2>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('rayons.index') }}"> Back</a>
                </div>
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
<form action="{{ route('rayons.store') }}" method="POST">
    @csrf 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Rayon:</strong>
                <input type="text" name="nama_rayon" class="form-control" placeholder="Nama Rayon">
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pembimbing Rayon:</strong>
            <input type="text" name="pembimbing_rayon" class="form-control" placeholder="Pembimbing Rayon">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>No Hp:</strong>
            <input type="text" min="0" name="no_hp" class="form-control" placeholder="No Hp">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat:</strong>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection