
@extends('rombels.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add New Rombel</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('rombels.index') }}"> Back</a>
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
<form action="{{ route('rombels.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Rombel:</strong>
<input type="text" name="rombel" class="form-control" placeholder="Rombel">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
