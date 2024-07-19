<?php

namespace App\Http\Controllers;

use App\Models\Projecteur;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class ProjecteurController extends Controller
{
        public function store(Request $request)
        {


            $request->validate([

            'designation' => 'required',
            'num_serie' => 'required',
            'date_achat' => 'required',
            'etat' => 'required',
            'user' => 'required',
            'etiquette' => 'required',
            'remarque' => 'required',

            ]);

            $projecteurs = new Projecteur();
            $projecteurs->designation = $request->input('designation');
            $projecteurs->num_serie = $request->input('num_serie');
            $projecteurs->date_achat = $request->input('date_achat');
            $projecteurs->etat = $request->input('etat');
            $projecteurs->user = $request->input('user');
            $projecteurs->etiquette = $request->input('etiquette');
            $projecteurs->remarque = $request->input('remarque');


            $projecteurs->save();

            return redirect()->back()->with('success', 'Matériel bien ajouté!');
        }

        //show a material
        public function show (string $id)
        {


            $projecteurs = Projecteur::findOrFail($id);

            return view('pages.videoprojecteur.showVideo', compact('projecteurs'));
        }

        //delete a material
        public function delete(string $id)
        {
            $projecteurs = Projecteur::findOrFail($id);

            return view('pages.videoprojecteur.deleteVideo', compact('projecteurs'));
        }

        public function index (string $id)
        {


            $projecteurs = Projecteur::findOrFail($id);

            return view('pages.videoprojecteur.editVideo', compact('projecteurs'));
        }

        /**
         * Suppression contenu
         */
        public function destroy(string $id)
        {
            $projecteurs = Projecteur::findOrFail($id);

            $projecteurs->delete();

            return redirect()->route('liste_projecteurs')->with('success','Contenu supprimé avec succès!');
        }

        //update a material
        public function update(Request $request, string $id)
        {
            $projecteurs = Projecteur::findOrFail($id);

            $projecteurs->update($request->all());

            return redirect()->back()->with('success','Contenu modifié avec succès!');
        }

        //generate a mater'ials qrcode
        public function qrcode($id)
        {
            $url = route('voir_projecteur', ['id' => $id]);
            $qrcode = QrCode::size(200)->generate($url);
            return view('welcome',compact('qrcode','id'));
        }
}
