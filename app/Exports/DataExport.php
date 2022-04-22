<?php

namespace App\Exports;

use App\Models\Kopi;
use App\Models\Pekerja;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    public function view(): View
    {
        // kopi with pekerja
        $data = Kopi::with('pekerja')->get();
        return view('laporan.data', [
            'data' => $data
        ]);
    }
}