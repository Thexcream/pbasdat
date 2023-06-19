<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;

    protected $fillable = [
        'rpb',
        'kp1',
        'kp2',
        'kp3',
        'jeniskerjasama',
        'jumlahijazah',
        'nama1',
        'nama2',
        'jabatan1',
        'jabatan2',
        'kcm',
        'ps',
        'sp',
        'penjadwalan',
        'skijazah',
        'ksl',
        'studimoa',
        'created_at',
        'updated_at',
    ];
}
