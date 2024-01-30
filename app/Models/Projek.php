<?php

namespace App\Models;

use App\Models\Tugas;
use App\Models\Permen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projek extends Model
{
    use HasFactory;
    protected $fillable = [
        'projek',
        'tahun',
        'status',
        'permen_id'
    ];

    public function permen()
    {
        return $this->belongsTo(Permen::class);
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    
}
