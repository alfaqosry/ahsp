<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hargabahans extends Model
{
    use HasFactory;

    protected $fillable = [
        'harga',
        'bahan_id',
        'tugas_id',
    ];
}
