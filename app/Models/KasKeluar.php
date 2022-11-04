<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    use HasFactory;

    protected $table = 'kas_keluar';
    protected $primaryKey = 'id_kas_keluar'; 

    protected $guarded = [
        'id_kas_keluar'
    ];
}
