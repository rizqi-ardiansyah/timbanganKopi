@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah pekerja</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pekerja}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah data kopi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kopi}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-coffee fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Berat Kopi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$scale}} Kg</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
@endsection