<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Ayah extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    // use HasFactory;
    protected $fillable = ['nama', 'nik', 'bin','tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'agama', 'pekerjaan', 'alamat'];

    
}
