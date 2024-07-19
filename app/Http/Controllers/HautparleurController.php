<?php

namespace App\Http\Controllers;

use App\Models\Hautparleur;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HautparleurController extends Controller
{
    //add new Hautparleur
    public function store(Request $request)
    {


        $request->validate([

           'designation' => 'required',
           'num_serie' => 'required',
           'date_achat' => 'required',
           'status' => 'required',

           'etiquette' => 'required',
           'remarque' => 'required',

           'emplacement' => 'required'
        ]);

        $hautparleurs = new Hautparleur();
        $hautparleurs->designation = $request->input('designation');
        $hautparleurs->num_serie = $request->input('num_serie');
        $hautparleurs->date_achat = $request->input('date_achat');
        $hautparleurs->status = $request->input('status');

        $hautparleurs->etiquette = $request->input('etiquette');
        $hautparleurs->remarque = $request->input('remarque');

        $hautparleurs->emplacement = $request->input('emplacement');
        $hautparleurs->save();

        return redirect()->back()->with('success','Créer avec succès!');
    }

     //show a Hautparleur
     public function show (string $id)
     {


        $hautparleurs = Hautparleur::findOrFail($id);

        return view('pages.hautparleurs.showHautParleur', compact('hautparleurs'));
     }

      //delete a hautparleurs
      public function delete(string $id)
      {
          $hautparleurs = Hautparleur::findOrFail($id);

          return view('pages.hautparleurs.deleteHaut_parleur', compact('hautparleurs'));
      }

      public function index (string $id)
      {


         $hautparleurs = Hautparleur::findOrFail($id);

         return view('pages.hautparleurs.editHautParleur', compact('hautparleurs'));
      }//

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $hautparleurs = Hautparleur::findOrFail($id);

          $hautparleurs->delete();

          return redirect()->route('liste_hautparleurs')->with('success','Contenu supprimé avec succès!');
      }

      //update a hautparleurs
      public function update(Request $request, string $id)
      {
          $hautparleurs = Hautparleur::findOrFail($id);

          $hautparleurs->update($request->all());

          return redirect()->back()->with('success','Contenu modifié avec succès!');
      }

      //generate a hautparleurs's qrcode
     public function qrcode($id)
     {
         $url = route('voir_hautparleur', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
