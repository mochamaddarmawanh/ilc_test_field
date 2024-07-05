<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'uraian_barang',
        'bm',
        'nilai_komoditas',
        'nilai_bm',
    ];
}
