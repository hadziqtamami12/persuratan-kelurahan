<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Dokumen_nikah extends Model
{
    // use HasFactory;
    use HasFactory, Notifiable, SoftDeletes;

}
