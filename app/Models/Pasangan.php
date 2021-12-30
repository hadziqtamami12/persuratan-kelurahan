<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasangan extends Model
{
    // use HasFactory, Notifiable, SoftDeletes;
    use HasFactory;
    protected $fillable = ['nama', 'nik', 'bin','tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'agama', 'pekerjaan', 'alamat', 'status_nikah'];

    public function keluarga()
    {
        return $this->belongsTo('App\Models\Keluarga', 'keluarga_id');
    }
    
}

