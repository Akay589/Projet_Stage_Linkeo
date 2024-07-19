<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imprimante extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'num_serie',
        'date_achat',

        'user',
        'etiquette',
        'remarque',
        'status'
    ];
}
