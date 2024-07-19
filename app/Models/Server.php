<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [

        'designation' ,
        'num_serie' ,
        'date_achat' ,
        'etat' ,

        'etiquette' ,
        'remarque' ,

        'emplacement'
    ];
}
