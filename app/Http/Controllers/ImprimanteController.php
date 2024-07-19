<?php

namespace App\Http\Controllers;

use App\Models\Imprimante;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ImprimanteController extends Controller
{
     //add new Imprimante
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

         $imprimantes = new Imprimante();
         $imprimantes->designation = $request->input('designation');
         $imprimantes->num_serie = $request->input('num_serie');
         $imprimantes->date_achat = $request->input('date_achat');
         $imprimantes->status = $request->input('status');
         $imprimantes->user = $request->input('user');
         $imprimantes->etiquette = $request->input('etiquette');
         $imprimantes->remarque = $request->input('remarque');

         $imprimantes->save();

         return redirect()->back()->with('success','Créer avec succès!');
     }

      //show a Imprimante
    public function show (string $id)
    {


         $imprimantes = Imprimante::findOrFail($id);

         return view('pages.imprimante.showImprimante', compact('imprimantes'));
    }

       //delete a imprimantes
    public function delete(string $id)
    {
           $imprimantes = Imprimante::findOrFail($id);

           return view('pages.imprimante.deleteImprimante', compact('imprimantes'));
    }

    public function index (string $id)
    {


          $imprimantes = Imprimante::findOrFail($id);

          return view('pages.imprimante.editImprimante', compact('imprimantes'));
    }

       /**
        * Suppression contenu
        */
    public function destroy(string $id)
    {
           $imprimantes = Imprimante::findOrFail($id);

           $imprimantes->delete();

           return redirect()->route('liste_imprimantes')->with('success','Contenu supprimé avec succès!');
    }

       //update a imprimantes
    public function update(Request $request, string $id)
    {
           $imprimantes = Imprimante::findOrFail($id);

           $imprimantes->update($request->all());

           return redirect()->back()->with('success','Contenu modifié avec succès!');
    }

       //generate a imprimantes's qrcode
    public function qrcode($id)
    {
          $url = route('voir_imprimante', ['id' => $id]);
          $qrcode = QrCode::size(200)->generate($url);
          return view('welcome',compact('qrcode','id'));
    }
}
