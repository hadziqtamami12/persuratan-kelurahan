<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelahiran extends Model
{
    // use HasFactory, Notifiable, SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'nama', 'keluarga_id', 'jenkel','tempat_lahir', 'tanggal_lahir', 'anak_ke', 'nama_pelapor', 'no_kk', 'alamat', 'hubungan_pelapor', 'nama_penyalin', 'jenkel_penyalin', 'status_penyalin'
    ];

    public function keluarga()
    {
        return $this->belongsTo('App\Models\Keluarga', 'keluarga_id');
    }
    
}

