<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'satuan',
       
    ];

    public function bahan()
    {
        return $this->hasMany(Daftarbahan::class);
    }
    public function pekerja()
    {
        return $this->hasMany(Daftarpekerja::class);
    }
}
