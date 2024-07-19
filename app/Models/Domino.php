<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domino extends Model
{
    use HasFactory;

    protected $table = 'dominos';

    protected $fillable = [
      'imei',
      'type',
      'date_achat',
      'operateur',
      'user',
      'etiquette',
      'remarque',
      'status',
      'service',
    ];
}
