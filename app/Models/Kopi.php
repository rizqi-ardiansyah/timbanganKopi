<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pekerja;

class Kopi extends Model
{
    use HasFactory;

    // table tbl_kopi
    protected $table = 'tbl_kopi';

    // fillable
    protected $fillable = [
        'pekerja_id',
        'berat',
        'tgl_menimbang'
    ];

    // belongsTo pekerja
    public function pekerja()
    {
        return $this->belongsTo(pekerja::class, 'pekerja_id');
    }

}
