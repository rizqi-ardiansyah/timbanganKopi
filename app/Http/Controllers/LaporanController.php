<?php

namespace App\Http\Controllers;

use App\Exports\KopiExport;
use App\Exports\PekerjaExport;
use App\Exports\DataExport;
use Illuminate\Http\Request;

use Excel;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }
    
    // Print data to excel
    public function data()
    {
        return Excel::download(new DataExport, 'data.xlsx');
    }
    // Print data kopi to excel
    public function dataKopi()
    {
        return Excel::download(new KopiExport, 'data-kopi.xlsx');
    }
    
    // Print data Pekerja to excel
    public function dataPekerja()
    {
        return Excel::download(new PekerjaExport, 'data-pekerja.xlsx');
    }

    
}
