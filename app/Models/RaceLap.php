<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceLap extends Model
{
    use HasFactory;

    protected $table = 'race_laps';

    protected $fillable = [
        'hora',
        'piloto',
        'volta',
        'tempo',
        'velocidade'
    ];
}
