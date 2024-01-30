<?php

namespace App\Models;

use App\Models\Permen;
use App\Models\Pekerjaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenispekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_pekerjaan',
        'permen_id'
    ];

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }

    public function permen()
    {
        return $this->belongsTo(Permen::class);
    }

    

    
}
