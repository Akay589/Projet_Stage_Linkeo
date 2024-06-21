<?php

namespace App\Http\Controllers;

use App\Models\Machine;
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
         return view('pages.homepage') ;
     }

       //Add_material page
       public function addMat()
       {
           return view('pages.ajoutMateriel') ;
       }

        //Add_material page
        public function listemat()
        {
            $data = Machine::all();
            return view('pages.ListeMateriel' , ['machines'=>$data]) ;
        }
}
