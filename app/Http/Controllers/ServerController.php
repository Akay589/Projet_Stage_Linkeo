<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ServerController extends Controller
{
    //add new Server
    public function store(Request $request)
    {


        $request->validate([

           'designation' => 'required',
           'num_serie' => 'required',
           'date_achat' => 'required',
           'etat' => 'required',

           'etiquette' => 'required',
           'remarque' => 'required',

           'emplacement' => 'required'
        ]);

        $servers = new Server();
        $servers->designation = $request->input('designation');
        $servers->num_serie = $request->input('num_serie');
        $servers->date_achat = $request->input('date_achat');
        $servers->etat = $request->input('etat');

        $servers->etiquette = $request->input('etiquette');
        $servers->remarque = $request->input('remarque');

        $servers->emplacement = $request->input('emplacement');
        $servers->save();

        return redirect()->route('liste_servers')->with('success','Créer avec succès!');
    }

     //show a Server
     public function show (string $id)
     {


        $servers = Server::findOrFail($id);

        return view('pages.Server.showServer', compact('servers'));
     }

      //delete a servers
      public function delete(string $id)
      {
          $servers = Server::findOrFail($id);

          return view('pages.Server.deleteServer', compact('servers'));
      }

      public function index (string $id)
      {


         $servers = Server::findOrFail($id);

         return view('pages.Server.editServer', compact('servers'));
      }

      /**
       * Suppression contenu
       */
      public function destroy(string $id)
      {
          $servers = Server::findOrFail($id);

          $servers->delete();

          return redirect()->route('liste_servers')->with('success','Contenu supprimé avec succès!');
      }

      //update a servers
      public function update(Request $request, string $id)
      {
          $servers = Server::findOrFail($id);

          $servers->update($request->all());

          return redirect()->back()->with('success','Contenu modifié avec succès!');
      }

      //generate a servers's qrcode
     public function qrcode($id)
     {
         $url = route('voir_servers', ['id' => $id]);
         $qrcode = QrCode::size(200)->generate($url);
         return view('welcome',compact('qrcode','id'));
     }
}
