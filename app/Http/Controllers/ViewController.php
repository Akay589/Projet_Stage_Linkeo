<?php

namespace App\Http\Controllers;

use App\Models\Casque;
use App\Models\Domino;
use App\Models\Ecran;
use App\Models\Hautparleur;
use App\Models\Imprimante;
use App\Models\Machine;
use App\Models\Onduleur;
use App\Models\Phone;
use App\Models\Projecteur;
use App\Models\Server;
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
         return view('pages.homepage') ;
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
              //add_machine page
                    public function   addCasque()
                    {
                        return view('pages.Casques.ajoutCasque') ;
                    }
            //add souris page
                    public function   addSouris()
                    {
                        return view('pages.souris.ajoutSouris') ;
                    }
            //add onduleur page
                      public function   addOnduleur()
                      {
                          return view('pages.Onduleurs.ajoutOnduleur') ;
                      }
            //add Tv page
                  public function   addTv()
                  {
                      return view('pages.SmartTV.ajoutTV') ;
                  }
            //add phone page
                   public function   addPhone()
                   {
                       return view('pages.PosteTelephonique.ajoutPhone') ;
                   }
            //add serveur page
                   public function   addServer()
                   {
                       return view('pages.Server.ajoutServeur') ;
                   }
            //add videoprojecteur page
                    public function   addVideoprojecteur()
                    {
                        return view('pages.videoprojecteur.ajoutVideo') ;
                    }
            //add imprimante page
                    public function   addImprimante()
                    {
                        return view('pages.imprimante.ajoutImprimante') ;
                    }
            //add haut parleurs page
                      public function   addHautparleur()
                      {
                          return view('pages.hautparleurs.ajouthautparleurs') ;
                      }
            //add ecran page
                      public function   addEcran()
                      {
                          return view('pages.ecrans.ajoutEcran') ;
                      }

            //add domino  page
                        public function   addDomino()
                        {
                            return view('pages.dominos.ajoutDomino') ;
                        }
            //add camera page
                        public function   addCamera()
                        {
                            return view('pages.Cameras.ajoutCamera') ;
                        }



     //liste_material page
     public function liste()
     {
         return view('pages.Listes') ;
     }
                    //liste_machine page
                public function listemachine()
                {
                    $data = Machine::all();
                    return view('pages.machines.ListeMateriel' , ['machines'=>$data]) ;
                }
                    //liste_casque page
                    public function listecasque()
                    {
                        $data = Casque::all();
                        return view('pages.Casques.ListeCasque' , ['casques'=>$data]) ;
                    }
                    //liste tv  page
                    public function listeTv()
                    {
                        $data = Television::all();
                        return view('pages.SmartTV.ListeTV' , ['televisions'=>$data]) ;
                    }
                      //liste onduleur  page
                      public function listeOnduleurs()
                      {
                          $data = Onduleur::all();
                          return view('pages.Onduleurs.ListeOnduleur' , ['onduleurs'=>$data]) ;
                      }
                      //liste phone  page
                      public function listephone()
                      {
                          $data = Phone::all();
                          return view('pages.PosteTelephonique.ListePhone' , ['phones'=>$data]) ;
                      }

                       //liste projecteur  page
                       public function listeprojecteur()
                       {
                           $data = Projecteur::all();
                           return view('pages.videoprojecteur.listeVideo' , ['projecteurs'=>$data]) ;
                       }
                        //liste server  page
                        public function listeserver()
                        {
                            $data = Server::all();
                            return view('pages.Server.ListeServer' , ['servers'=>$data]) ;
                        }
                        //liste imprimante  page
                        public function listeimprimante()
                        {
                            $data = Imprimante::all();
                            return view('pages.imprimante.ListeImprimante' , ['imprimantes'=>$data]) ;
                        }

                        //liste haut parleur  page
                          public function listehautparleur()
                        {
                            $data = Hautparleur::all();
                            return view('pages.hautparleurs.ListeHautParleur' , ['hautparleurs'=>$data]) ;
                        }

                       //liste ecran  page
                            public function  listeecran ()
                        {
                            $data = Ecran::all();
                            return view('pages.ecrans.ListeEcran' , ['ecrans'=>$data]) ;
                        }
                        //liste domino  page
                            public function  listedomino ()
                            {
                                $data = Domino::all();
                                return view('pages.dominos.ListeDomino' , ['dominos'=>$data]) ;
                            }


}
