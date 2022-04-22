@extends('layouts.app')
@section('title','Laporan')
@section('content')
{{-- button download --}}
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('pekerja-ex')}}" class="btn btn-lg btn-danger"> <i class="fas fa-download"></i> Print Data Pekerja</a>
        <a href="{{route('kopi-ex')}}" class="btn btn-lg btn-warning"> <i class="fas fa-download"></i> Print Data Kopi</a>
        <a href="{{route('data-ex')}}" class="btn btn-lg btn-success"> <i class="fas fa-download"></i> Print Data</a>
    </div>

</div>
@endsection