<?php

namespace App\Http\Controllers;

use App\Models\Television;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TeleController extends Controller
{
    //ajout d'un nouvel tv
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


        ]);

        $televisions = new Television();
        $televisions->designation = $request->input('designation');
        $televisions->num_serie = $request->input('num_serie');
        $televisions->date_achat = $request->input('date_achat');
        $televisions->status = $request->input('status');
        $televisions->user = $request->input('user');
        $televisions->etiquette = $request->input('etiquette');
        $televisions->remarque = $request->input('remarque');

        $televisions->save();

        return redirect()->route('liste_tv')->with('success','Créer avec succès!');
    }

     //show a Television
     public function show (string $id)
     {


        $televisions = Television::findOrFail($id);

        return view('pages.SmartTV.showTV', compact('televisions'));
     }

      //delete a televisions
      public function delete(string $id)
      {
          $televisions = Television::findOrFail($id);

          return view('pages.SmartTV.deleteTV', compact('televisions'));
      }

      public function index (string $id)
      {


         $televisions = Television::findOrFail($id);

         return view('pages.SmartTV.editTV', compact('televisions'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $televisions = Television::findOrFail($id);

          $televisions->delete();

          return redirect()->route('liste_tv')->with('success','Contenu supprimé avec succès!');
      }

      //update a televisions
      public function update(Request $request, string $id)
      {
          $televisions = Television::findOrFail($id);

          $televisions->update($request->all());

          return redirect()->route('liste_tv')->with('success','Contenu modifié avec succès!');
      }

      //generate a televisions's qrcode
     public function qrcode($id)
     {
         $url = route('voir_televisions', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
