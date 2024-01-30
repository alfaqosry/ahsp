<?php

namespace App\Models;

use App\Models\Satuan;
use App\Models\Koefisien;
use App\Models\Jenisbahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daftarbahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'bahan',
        'satuan_id',
        'jenis_bahan_id'
    ];

    public function jenis_bahan()
    {
        return $this->belongsTo(Jenisbahan::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function koefisien()
    {
        return $this->hasMany(Koefisien::class);
    }

   
}
