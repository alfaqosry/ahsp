<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use App\Models\User as Kontraktoruser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontraktor extends Model
{
    use HasFactory;
     protected $fillable = [
        'nama_direktur',
        'nama_cv',
        'nik',
        'npwp',
        'no_akta_perusahaan',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(Kontraktoruser::class);
    }
}
