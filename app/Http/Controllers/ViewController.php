<?php

namespace App\Http\Controllers;

use App\Ldap\User;


use Illuminate\Support\Facades\Log;
use LdapRecord\Models\Model;
use App\Models\Materiel;


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







            public function addMachine()
                {
                    $users = User::get(); // Récupère tous les utilisateurs sans pagination


                    return view('pages.machines.ajoutMachine', ['users' => $users]);
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
