<?php

namespace App\Http\Controllers;


use App\Ldap\User;
use App\Ldap;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use SimpleSoftwareIO\QrCode\Facades\QrCode;

use LdapRecord\Models\ActiveDirectory\User as LdapUser;

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
         'user' => 'nullable|string',
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
      $materiels->user = $request->input('user');
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
      } else {
          // Pas de query fournie, récupérer tous les utilisateurs
          $users = User::all();
      }

      // Filtrer les utilisateurs dont le displayName n'est pas null ou 'N/A'
      $displayNames = $users->filter(function($user) {
          return $user->displayName !== null && $user->displayName !== 'N/A';
      })->pluck('displayName');

      return response()->json($displayNames);
  }










    public function getUsersFromLdap()
    {

        $displayNames = collect();

        // Récupérer les utilisateurs LDAP par paquets de 1000 (vous pouvez ajuster ce nombre)
        User::select(['displayname'])->chunk(1000, function ($users) use ($displayNames) {
            foreach ($users as $user) {
                if (isset($user->displayname[0]) && $user->displayname[0] !== 'N/A') {
                    $displayNames->push($user->displayname[0]);
                }
            }
        });
         // Retourner les displayNames
         return response()->json(['users' => $displayNames]);
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


