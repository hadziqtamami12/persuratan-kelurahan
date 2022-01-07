<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Permohonan_nikah extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    // use HasFactory;

    protected $fillable = ['pasangan_id', 'keluarga_id'];
    
    public function pasangan()
    {
        return $this->belongsTo('App\Models\Pasangan', 'pasangan_id');
    }
    public function keluarga()
    {
        return $this->belongsTo('App\Models\Keluarga', 'keluarga_id');
    }
}
