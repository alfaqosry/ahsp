<?php

namespace App\Models;

use App\Models\Jenispekerjaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pekerjaan',
        'jenispekerjaan_id'
    ];

    public function jenispekerjaan()
    {
        return $this->belongsTo(Jenispekerjaan::class);
    }
}
