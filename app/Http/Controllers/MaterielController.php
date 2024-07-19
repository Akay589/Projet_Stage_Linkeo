<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    //show listes materiels
    public function index() {

        $materiel = Materiel::all();

        return view('pages.Materiel', compact('materiel'));
    }
}
