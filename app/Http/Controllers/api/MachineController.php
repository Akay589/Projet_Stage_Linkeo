<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Machine;

class MachineController extends Controller
{
    //create a machine

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
           'status' => 'required'
        ]);

        $machine = new Machine();
        $machine->designation = $request->input('designation');
        $machine->num_serie = $request->input('num_serie');
        $machine->date_achat = $request->input('date_achat');
        $machine->etat = $request->input('etat');
        $machine->user = $request->input('user');
        $machine->etiquette = $request->input('etiquette');
        $machine->remarque = $request->input('remarque');
        $machine->status = $request->input('status');

        $machine->save();

        return redirect()->route('liste_material')->with('success','Créer avec succès!');
    }

    //show all machines
    public function show (string $id)
    {


       $machines = Machine::findOrFail($id);

       return view('pages.showMaterial', compact('machines'));
    }

     //delete a machine
     public function delete(string $id)
     {
         $machine = Machine::findOrFail($id);

         return view('pages.deleteMaterial', compact('machine'));
     }

     public function index (string $id)
     {


        $machine = Machine::findOrFail($id);

        return view('pages.editMaterial', compact('machine'));
     }

     /**
      * Suppression contenu
      */
     public function destroy(string $id)
     {
         $machine = Machine::findOrFail($id);

         $machine->delete();

         return redirect()->route('liste_material')->with('success','Contenu supprimé avec succès!');
     }

     //update a machine
     public function update(Request $request, string $id)
     {
         $machine = Machine::findOrFail($id);

         $machine->update($request->all());

         return redirect()->route('liste_material')->with('success','Contenu modifié avec succès!');
     }

     //generate a machine's qrcode
    public function qrcode($id)
    {
        $data = 'http://127.0.0.1:8000/voir_materiels/$id' ;
        $qrcode = QrCode::size(200)->generate($data);
        return view('welcome',compact('qrcode','id'));
    }
}
