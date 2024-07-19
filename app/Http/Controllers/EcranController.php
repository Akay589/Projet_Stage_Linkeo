<?php

namespace App\Http\Controllers;

use App\Models\Ecran;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EcranController extends Controller
{
    //add new Ecran
    public function store(Request $request)
    {


        $request->validate([

           'designation' => 'required',
           'num_serie' => 'required',
           'date_achat' => 'required',
           'status' => 'required',

           'etiquette' => 'required',
           'remarque' => 'required',
            'service' => 'required',
           'user' => 'required'
        ]);

        $ecrans = new Ecran();
        $ecrans->designation = $request->input('designation');
        $ecrans->num_serie = $request->input('num_serie');
        $ecrans->date_achat = $request->input('date_achat');
        $ecrans->status = $request->input('status');

        $ecrans->etiquette = $request->input('etiquette');
        $ecrans->remarque = $request->input('remarque');
        $ecrans->service = $request->input('service');
        $ecrans->user = $request->input('user');
        $ecrans->save();

        return redirect()->back()->with('success','Créer avec succès!');
    }

     //show a Ecran
     public function show (string $id)
     {


        $ecrans = Ecran::findOrFail($id);

        return view('pages.ecrans.showEcran', compact('ecrans'));
     }

      //delete a ecrans
      public function delete(string $id)
      {
          $ecrans = Ecran::findOrFail($id);

          return view('pages.ecrans.deleteEcran', compact('ecrans'));
      }

      public function index (string $id)
      {


         $ecrans = Ecran::findOrFail($id);

         return view('pages.ecrans.editEcran', compact('ecrans'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $ecrans = Ecran::findOrFail($id);

          $ecrans->delete();

          return redirect()->route('liste_ecrans')->with('success','Contenu supprimé avec succès!');
      }

      //update a ecrans
      public function update(Request $request, string $id)
      {
          $ecrans = Ecran::findOrFail($id);

          $ecrans->update($request->all());

          return redirect()->back()->with('success','Contenu modifié avec succès!');
      }

      //generate a ecrans's qrcode
     public function qrcode($id)
     {
         $url = route('voir_ecran', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
