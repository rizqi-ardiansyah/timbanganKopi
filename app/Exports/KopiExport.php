<?php

namespace App\Exports;

use App\Models\Kopi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KopiExport implements FromView
{
    public function view(): View
    {
        return view('laporan.kopi', [
            'data' => Kopi::all()
        ]);
    }
}