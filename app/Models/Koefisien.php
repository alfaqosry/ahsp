<?php

namespace App\Models;

use App\Models\Daftarbahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Koefisien extends Model
{
    use HasFactory;
    protected $fillable = [
        'koefisien',
        'bahan_id',
        'pekerjaan_id'
    ];

    public function bahan()
    {
        return $this->belongsTo(Daftarbahan::class);
    }

}
