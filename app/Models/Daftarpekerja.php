<?php

namespace App\Models;

use App\Models\Satuan;
use App\Models\Koefisienpekerja;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daftarpekerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'pekerja',
        'satuan_id',
        'kode'
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    public function koefisienpekerja()
    {
        return $this->hasMany(Koefisienpekerja::class);
    }
}
