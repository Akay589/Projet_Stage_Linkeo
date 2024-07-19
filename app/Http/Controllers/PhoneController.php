<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PhoneController extends Controller
{
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

        $phones = new Phone();
        $phones->designation = $request->input('designation');
        $phones->num_serie = $request->input('num_serie');
        $phones->date_achat = $request->input('date_achat');
        $phones->status = $request->input('status');
        $phones->user = $request->input('user');
        $phones->etiquette = $request->input('etiquette');
        $phones->remarque = $request->input('remarque');


        $phones->save();

        return redirect()->route('liste_phones')->with('success','Créer avec succès!');
    }

     //show a material
     public function show (string $id)
     {


        $phones = Phone::findOrFail($id);

        return view('pages.PosteTelephonique.showPhone', compact('phones'));
     }

      //delete a material
      public function delete(string $id)
      {
          $phones = Phone::findOrFail($id);

          return view('pages.PosteTelephonique.deletePhone', compact('phones'));
      }

      public function index (string $id)
      {


         $phones = Phone::findOrFail($id);

         return view('pages.PosteTelephonique.editPhone', compact('phones'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $phones = Phone::findOrFail($id);

          $phones->delete();

          return redirect()->route('liste_phones')->with('success','Contenu supprimé avec succès!');
      }

      //update a material
      public function update(Request $request, string $id)
      {
          $phones = Phone::findOrFail($id);

          $phones->update($request->all());

          return redirect()->route('liste_phones')->with('success','Contenu modifié avec succès!');
      }

      //generate a mater'ials qrcode
     public function qrcode($id)
     {
         $url = route('voir_phone', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
