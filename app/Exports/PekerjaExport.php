<?php

namespace App\Exports;

use App\Models\Pekerja;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PekerjaExport implements FromView
{
    public function view(): View
    {
        return view('laporan.pekerja', [
            'data' => Pekerja::all()
        ]);
    }
}