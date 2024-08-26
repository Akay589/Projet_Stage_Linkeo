<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Casque;
use App\Models\Domino;
use App\Models\Ecran;
use App\Models\Hautparleur;
use App\Models\Imprimante;
use App\Models\Machine;
use App\Models\Materiel;
use App\Models\Onduleur;
use App\Models\Phone;
use App\Models\Projecteur;
use App\Models\Server;
use App\Models\Souri;
use App\Models\Television;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //login page
  public function login()
    {
        return view('pages.athentification') ;
    }

     //home page
     public function home()
     {
        $materiels = Materiel::all();


         return view('pages.homepage', compact('materiels'));
     }

     //Add_material page
       public function addMat()
       {
           return view('pages.ajoutMateriel') ;
       }

              //add_machine page
                    public function   addMachine ()
                    {
                        return view('pages.machines.ajoutMachine') ;
                    }





     //liste_material page
     public function liste()
     {
         return view('pages.Listes') ;
     }

    //scanner page

    public function scanner()
    {
        return view('pages.machines.scanMateriel') ;
    }

}
