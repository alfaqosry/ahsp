<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upahpekerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'pekerja_id',
        'tugas_id',
        'upah'
      
    ];
}
