<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Kematian extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    // use HasFactory;
    protected $fillable = ['nama', 'tanggal', 'jenkel','tempat_lahir', 'tanggal_lahir', 'usia', 'agama', 'pekerjaan', 'alamat', 'status_kawin','tempat_kematian', 'penyebab_kematian', 'nama_pelapor', 'hubungan_pelapor'];

    public function ayah()
    {
        return $this->belongsTo('App\Models\Ayah', 'user_id');
    }
    
}
