<?php

namespace App\Models;

use App\Models\Daftarbahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenisbahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'jenis_bahan',
       
    ];



    public function bahan()
    {
        return $this->hasMany(Daftarbahan::class);
    }
}
