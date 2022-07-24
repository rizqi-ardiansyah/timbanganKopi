<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kopi;

class Pekerja extends Model
{
    use HasFactory;

    // table tbl_pekerja
    protected $table = 'tbl_pekerja';

    // fillable
    protected $fillable = [
        'id_pekerja',
        'nama',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'status'
    ];

    // belongsTo kopi
    public function kopi()
    {
        return $this->hasMany(Kopi::class);
    }
 
}
