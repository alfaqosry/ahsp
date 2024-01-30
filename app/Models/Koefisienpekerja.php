<?php

namespace App\Models;

use App\Models\Daftarpekerja;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koefisienpekerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'koefisien',
        'pekerja_id',
        'pekerjaan_id'
    ];

    public function pekerja()
    {
        return $this->belongsTo(Daftarpekerja::class);
    }
}
