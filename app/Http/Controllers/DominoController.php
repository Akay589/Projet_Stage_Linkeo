<?php

namespace App\Http\Controllers;

use App\Models\Domino;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DominoController extends Controller
{
    ///ajout d'un nouvel domino
    public function store(Request $request)
    {


        $request->validate([

           'imei' => 'required',
           'type' => 'required',
           'date_achat' => 'required',
           'status' => 'required',
           'user' => 'required',
           'etiquette' => 'required',
           'remarque' => 'required',
           'operateur' => 'required',
           'service' => 'required',


        ]);

        $dominos = new Domino();
        $dominos->imei = $request->input('imei');
        $dominos->type = $request->input('type');
        $dominos->date_achat = $request->input('date_achat');
        $dominos->status = $request->input('status');
        $dominos->user = $request->input('user');
        $dominos->etiquette = $request->input('etiquette');
        $dominos->remarque = $request->input('remarque');
        $dominos->operateur = $request->input('operateur');
        $dominos->service = $request->input('service');

        $dominos->save();

        return redirect()->back()->with('success','Créer avec succès!');
    }

     //show a Domino
     public function show (string $id)
     {


        $dominos = Domino::findOrFail($id);

        return view('pages.dominos.showDomino', compact('dominos'));
     }

      //delete a dominos
      public function delete(string $id)
      {
          $dominos = Domino::findOrFail($id);

          return view('pages.dominos.deleteDomino', compact('dominos'));
      }

      public function index (string $id)
      {


         $dominos = Domino::findOrFail($id);

         return view('pages.dominos.editDomno', compact('dominos'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $dominos = Domino::findOrFail($id);

          $dominos->delete();

          return redirect()->route('liste_dominos')->with('success','Contenu supprimé avec succès!');
      }

      //update a dominos
      public function update(Request $request, string $id)
      {
          $dominos = Domino::findOrFail($id);

          $dominos->update($request->all());

          return redirect()->back()->with('success','Contenu modifié avec succès!');
      }

      //generate a dominos's qrcode
     public function qrcode($id)
     {
         $url = route('voir_domino', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
