<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    public function pasangan()
    {
        return $this->belongsTo('App\Models\Pasangan', 'pasangan_id');
    }
    public function keluarga()
    {
        return $this->belongsTo('App\Models\Keluarga', 'keluarga_id');
    }
}
