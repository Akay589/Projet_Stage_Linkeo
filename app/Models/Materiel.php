<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;


    protected $fillable = [
       'categorie',
       'designation',
       'num_serie',
       'date_achat',
       'status',
       'usager',
       'etiquette',
       'remarque',
       'services',
       'emplacement',
       'type',
       'operateur',
       'mac',
       'ip',
       'user'
    ] ;
}
