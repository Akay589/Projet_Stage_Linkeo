<?php

namespace App\Http\Controllers;

use App\Ldap\User;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Phpml\Dataset\ArrayDataset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;





use Phpml\Classification\Ensemble\RandomForest;

use Phpml\Classification\RandomForestClassifier;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;

class MaterielController extends Controller
{
    //create a materiels
    public function store(Request $request)
    {
        // Valider les champs du formulaire, certains champs peuvent être vides
      // Valider les données envoyées
        $validatedData = $request->validate([
            'Designation' => 'nullable|string',
            'Num_Serie' => 'nullable|string',
            'Date_Achat' => 'nullable|string',
            'Status' => 'nullable|string',
            'Usager' => 'nullable|string',
            'Etiquette' => 'nullable|string',
            'Remarque' => 'nullable|string',
            'Services' => 'nullable|string',
            'Emplacement' => 'nullable|string',
            'Type' => 'nullable|string',
            'Operateur' => 'nullable|string',
            'Mac' => 'nullable|string',
            'Ip' => 'nullable|string',
            'User' => 'nullable|string'
        ]);

        // Appeler l'API de prédiction pour obtenir la catégorie
        $response = Http::post('http://127.0.0.1:5000/predictcategorie', [
            'Designation' => $request->input('Designation'),
            'Num Serie' => $request->input('Num_Serie'),
            'Date Achat' => $request->input('Date_Achat'),
            'Status' => $request->input('Status'),
            'Usager' => $request->input('Usager'),
            'Services' => $request->input('Services'),
            'Emplacement' => $request->input('Emplacement'),
            'Etiquette' => $request->input('Etiquette'),
            'Remarque' => $request->input('Remarque'),
            'Type' => $request->input('Type'),
            'Operateur' => $request->input('Operateur'),
            'Mac' => $request->input('Mac'),
            'Ip' => $request->input('Ip'),
            'User' => $request->input('User'),
        ]);

        // Check if the response is successful and contains the predicted category
        if ($response->successful() && $response->json('predicted_categorie') !== null) {
            $predictedCategory = $response->json('predicted_categorie');
        } else {
            // Log the error response for debugging
            Log::error('API Error Response: ' . $response->body());
            return redirect()->back()->with('error', 'Unable to predict category. Please try again.');
        }

        // Enregistrer les données dans la table 'materiels'
        $materiel = Materiel::create([
            'categorie' => $predictedCategory,  // Catégorie prédite
            'designation' => $request->input('Designation'),
            'num_serie' => $request->input('Num_Serie'),
            'date_achat' => $request->input('Date_Achat'),
            'status' => $request->input('Status'),
            'usager' => $request->input('Usager'),
            'etiquette' => $request->input('Etiquette'),
            'remarque' => $request->input('Remarque'),
            'services' => $request->input('Services'),
            'emplacement' => $request->input('Emplacement'),
            'type' => $request->input('Type'),
            'operateur' => $request->input('Operateur'),
            'mac' => $request->input('Mac'),
            'ip' => $request->input('Ip'),
            'user' => $request->input('User'),
        ]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success','Contenu ajouté avec succès!');
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


  //ldap fonctionnality

  public function fetchUserLdap(Request $request)
  {
      $query = $request->input('query', '');

      // Si une query est fournie, filtrer par uid, sn ou givenname
      if (!empty($query)) {
          $users = User::where('uid', 'starts_with', $query)
              ->orWhere('sn', 'starts_with', $query)
              ->orWhere('givenname', 'starts_with', $query)
              ->get();
      }
      // Filtrer les utilisateurs dont le displayName n'est pas null ou 'N/A'
      $displayNames = $users->filter(function($user) {
          return $user->displayName !== null && $user->displayName !== 'N/A';
      })->pluck('displayName');

      return response()->json($displayNames);
  }
















    public function countDisplayNames()
    {
        $users = User::get();

        // Filtrer les utilisateurs sans displayName
        $usersWithoutDisplayName = $users->filter(function ($user) {
            return !isset($user->displayName) || empty($user->displayName[0]);
        });

        // Compter le nombre d'utilisateurs sans displayName
        $count = $usersWithoutDisplayName->count();


        return response()->json(['total_display_names' => $count]);
    }


    public function getAllUsers($blockSize = 1000)
    {
       // Utiliser un filtre pour ne récupérer que les utilisateurs avec un displayName non vide
        $users = User::get();


        return response()->json([

            'users' => $users
        ]);
    }




}





