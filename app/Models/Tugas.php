<?php

namespace App\Models;

use App\Models\User;
use App\Models\Projek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'projek_id',
        'surveyor_id',
      
    ];

    public function projek()
    {
        return $this->belongsTo(Projek::class);
    }

    public function surveyor()
    {
        return $this->belongsTo(User::class);
    }
}
