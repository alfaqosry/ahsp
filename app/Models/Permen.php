<?php

namespace App\Models;

use App\Models\Projek;
use App\Models\Jenispekerjaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permen extends Model
{
    use HasFactory;
      protected $fillable = [
        'permen',
       
    ];

    public function projek()
    {
        return $this->hasMany(Projek::class);
    }

    public function jenispekerjaan()
    {
        return $this->hasMany(Jenispekerjaan::class);
    }
}
