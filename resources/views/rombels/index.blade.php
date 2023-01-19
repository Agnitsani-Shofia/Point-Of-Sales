@extends('rombels.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
    <h2>Data Rombel</h2>
            </div>
        <div class="pull-right">
            <a class="btn btn-info" href=" {{ route('products.index') }}"> Data Product </a>
            <a class="btn btn-info" href=" {{ route('siswas.index') }}"> Data Siswa </a>
            <a class="btn btn-info" href=" {{ route('rayons.index') }}"> Data Rayon </a>
        <a class="btn btn-success" href="{{ route('rombels.create') }}"> Create New Rombel</a>
            </div>
        </div>
    </div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Rombel</th>
<th width="280px">Action</th>
</tr>
@foreach ($rombels as $rombel)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $rombel->rombel }}</td>
<td>
<form action="{{ route('rombels.destroy',$rombel->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('rombels.show',$rombel->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('rombels.edit',$rombel->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus {{ $rombel->rombel }} ?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $rombels->links() !!}
@endsection
