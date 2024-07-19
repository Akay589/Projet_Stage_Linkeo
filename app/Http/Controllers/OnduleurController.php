<?php

namespace App\Http\Controllers;

use App\Models\Onduleur;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class onduleurController extends Controller
{
    //add new onduleur
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

        $onduleurs = new Onduleur();
        $onduleurs->designation = $request->input('designation');
        $onduleurs->num_serie = $request->input('num_serie');
        $onduleurs->date_achat = $request->input('date_achat');
        $onduleurs->status = $request->input('status');

        $onduleurs->etiquette = $request->input('etiquette');
        $onduleurs->remarque = $request->input('remarque');

        $onduleurs->emplacement = $request->input('emplacement');
        $onduleurs->save();

        return redirect()->route('liste_onduleurs')->with('success','Créer avec succès!');
    }

     //show a onduleur
     public function show (string $id)
     {


        $onduleurs = Onduleur::findOrFail($id);

        return view('pages.Onduleurs.showOnduleur', compact('onduleurs'));
     }

      //delete a onduleurs
      public function delete(string $id)
      {
          $onduleurs = Onduleur::findOrFail($id);

          return view('pages.Onduleurs.deleteOnduleur', compact('onduleurs'));
      }

      public function index (string $id)
      {


         $onduleurs = Onduleur::findOrFail($id);

         return view('pages.Onduleurs.editOnduleur', compact('onduleurs'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $onduleurs = Onduleur::findOrFail($id);

          $onduleurs->delete();

          return redirect()->route('liste_onduleurs')->with('success','Contenu supprimé avec succès!');
      }

      //update a onduleurs
      public function update(Request $request, string $id)
      {
          $onduleurs = Onduleur::findOrFail($id);

          $onduleurs->update($request->all());

          return redirect()->route('liste_onduleurs')->with('success','Contenu modifié avec succès!');
      }

      //generate a onduleurs's qrcode
     public function qrcode($id)
     {
         $url = route('voir_onduleurs', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
