<?php

namespace App\Http\Controllers;

use App\Models\Casque;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CasqueController extends Controller
{
    //add new casque
    public function store(Request $request)
    {


        $request->validate([

           'designation' => 'required',
           'num_serie' => 'required',
           'date_achat' => 'required',
           'status' => 'required',
           'user' => 'required',
           'etiquette' => 'required',
           'remarque' => 'required',

           'service' => 'required'
        ]);

        $casques = new Casque();
        $casques->designation = $request->input('designation');
        $casques->num_serie = $request->input('num_serie');
        $casques->date_achat = $request->input('date_achat');
        $casques->status = $request->input('status');
        $casques->user = $request->input('user');
        $casques->etiquette = $request->input('etiquette');
        $casques->remarque = $request->input('remarque');

        $casques->service = $request->input('service');
        $casques->save();

        return redirect()->route('liste_casques')->with('success','Créer avec succès!');
    }

     //show a casque
     public function show (string $id)
     {


        $casques = Casque::findOrFail($id);

        return view('pages.Casques.showCasque', compact('casques'));
     }

      //delete a casques
      public function delete(string $id)
      {
          $casques = Casque::findOrFail($id);

          return view('pages.Casques.deleteCasque', compact('casques'));
      }

      public function index (string $id)
      {


         $casques = Casque::findOrFail($id);

         return view('pages.Casques.editCasque', compact('casques'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $casques = Casque::findOrFail($id);

          $casques->delete();

          return redirect()->route('liste_casques')->with('success','Contenu supprimé avec succès!');
      }

      //update a casques
      public function update(Request $request, string $id)
      {
          $casques = Casque::findOrFail($id);

          $casques->update($request->all());

          return redirect()->route('liste_casques')->with('success','Contenu modifié avec succès!');
      }

      //generate a casques's qrcode
     public function qrcode($id)
     {
         $url = route('voir_casques', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
