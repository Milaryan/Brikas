<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;

    protected $table = 'kas_masuk';
    protected $primaryKey = 'id_kas_masuk'; 

    // protected $guarded = [
    //     'id'
    // ];

    protected $fillable = [
        'jenis_pemasukan',
        'jumlah',
        'tanggal',
        'nama_penyetor',
        'keterangan'
    ];
}
