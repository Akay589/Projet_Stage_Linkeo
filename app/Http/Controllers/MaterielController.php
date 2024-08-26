<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MaterielController extends Controller
{
    //create a materiels

  public function store(Request $request)
  {


      $request->validate([
         'categorie' => 'required',
         'designation' => 'nullable|string',
         'num_serie' => 'nullable|string',
         'date_achat' => 'nullable|string',
         'status' => 'nullable|string',
         'usager' => 'nullable|string',
         'etiquette' => 'nullable|string',
         'remarque' => 'nullable|string',
         'emplacement' => 'nullable|string',
         'services' => 'nullable|string',
         'type' => 'nullable|string',
         'operateur' => 'nullable|string',
         'mac' => 'nullable|string',
         'ip' => 'nullable|string',
      ]);

      $materiels = new Materiel();
      $materiels->categorie = $request->input('categorie');
      $materiels->designation = $request->input('designation');
      $materiels->num_serie = $request->input('num_serie');
      $materiels->date_achat = $request->input('date_achat');
      $materiels->status = $request->input('status');
      $materiels->usager = $request->input('usager');
      $materiels->etiquette = $request->input('etiquette');
      $materiels->remarque = $request->input('remarque');
      $materiels->emplacement = $request->input('emplacement');
      $materiels->services = $request->input('services');
      $materiels->type = $request->input('type');
      $materiels->operateur = $request->input('operateur');
      $materiels->mac = $request->input('mac');
      $materiels->ip = $request->input('ip');
      $materiels->save();

      return redirect()->back()->with('success','Créé avec succès!');
  }

  //show all materielss
  public function show (string $id)
  {


     $materiels = Materiel::findOrFail($id);

     return view('pages.machines.showMaterial', compact('materiels'));
  }


   //delete a materiels
   public function delete(string $id)
   {
       $materiels = Materiel::findOrFail($id);

       return view('pages.machines.deleteMaterial', compact('materiels'));
   }

   public function index (string $id)
   {


      $materiels = Materiel::findOrFail($id);

      return view('pages.machines.editMaterial', compact('materiels'));
   }

   /**
    * Suppression contenu
    */
   public function destroy(string $id)
   {
       $materiels = Materiel::findOrFail($id);

       $materiels->delete();

       return redirect()->route('home')->with('success','Contenu supprimé avec succès!');
   }

   //update a materiels
   public function update(Request $request, string $id)
   {
       $materiels = Materiel::findOrFail($id);

       $materiels->update($request->all());

       return redirect()->back()->with('success','Contenu modifié avec succès!');
   }

   //to find a material
   public function search(Request $request)
    {
        $searchBy = $request->input('search_by');
        $query = $request->input('query');

        // Exemple de requête
        $materiels = Materiel::where($searchBy, 'like', '%' . $query . '%')->get();
        if ($materiels->isEmpty()) {
            $message = 'Aucun matériel de ce type';
        }

        return view('pages.homepage', compact('materiels'));
    }


   //generate a materiels's qrcode
  public function qrcode($id)
  {
      $url = route('voir_materiel', ['id' => $id]);
      $qrcode = QrCode::size(200)->generate($url);
      return view('welcome',compact('qrcode','id'));
  }
}
