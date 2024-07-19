<?php

use App\Http\Controllers\api\MachineController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CasqueController;
use App\Http\Controllers\DominoController;
use App\Http\Controllers\EcranController;
use App\Http\Controllers\HautparleurController;
use App\Http\Controllers\ImprimanteController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\OnduleurController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProjecteurController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\TeleController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;




//Route::get('/', [App\Http\Controllers\QrcodeController::class,'Machine'])->name('/');







Route::get('/auth', [ViewController::class, 'login'])->name('/auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout_admin', [AuthController::class, 'logout_admin'])->name('logout_admin');

Route::group(['middleware'=> 'App\Http\Middleware\AdminMiddleware'], function ()
{
    Route::get('/', function () {
        return view('pages.homepage');
    });

    Route::get('/home', [ViewController::class,'home'])->name('/home');
    Route::get('/add_machine', [ViewController::class,'addMachine'])->name('add_machine');
    Route::get('/add_casque', [ViewController::class,'addCasque'])->name('add_casque');
    Route::get('/add_souris', [ViewController::class,'addSouris'])->name('add_souris');
    Route::get('/add_onduleur', [ViewController::class,'addOnduleur'])->name('add_onduleur');
    Route::get('/add_tv', [ViewController::class,'addTv'])->name('add_tv');
    Route::get('/add_phone', [ViewController::class,'addPhone'])->name('add_phone');
    Route::get('/add_server', [ViewController::class,'addServer'])->name('add_server');
    Route::get('/add_videoprojecteur', [ViewController::class,'addVideoprojecteur'])->name('add_videoprojecteur');
    Route::get('/add_imprimante', [ViewController::class,'addImprimante'])->name('add_imprimante');
    Route::get('/add_hautparleur', [ViewController::class,'addHautparleur'])->name('add_hautparleur');
    Route::get('/add_ecran', [ViewController::class,'addEcran'])->name('add_ecran');
    Route::get('/add_domino', [ViewController::class,'addDomino'])->name('add_domino');
    Route::get('/add_camera', [ViewController::class,'addCamera'])->name('add_camera');







    Route::get('/liste_machine', [ViewController::class,'listemachine'])->name('liste_machine');
    Route::get('/liste_casque', [ViewController::class,'listecasque'])->name('liste_casques');
    Route::get('/liste_phones', [ViewController::class,'listephone'])->name('liste_phones');
    Route::get('/liste_onduleurs', [ViewController::class,'listeOnduleurs'])->name('liste_onduleurs');
    Route::get('/liste_tv', [ViewController::class,'listeTv'])->name('liste_tv');
    Route::get('/liste_projecteurs', [ViewController::class,'listeprojecteur'])->name('liste_projecteurs');
    Route::get('/liste_servers', [ViewController::class,'listeserver'])->name('liste_servers');
    Route::get('/liste_imprimantes', [ViewController::class,'listeimprimante'])->name('liste_imprimantes');
    Route::get('/liste_hautparleurs', [ViewController::class,'listehautparleur'])->name('liste_hautparleurs');
    Route::get('/liste_ecrans', [ViewController::class,'listeecran'])->name('liste_ecrans');
    Route::get('/liste_dominos', [ViewController::class,'listedomino'])->name('liste_dominos');

    Route::get('/liste', [ViewController::class,'liste'])->name('liste');

//***********Machine**************** */
    Route::post('/machine_add', [MachineController::class,'store'])->name('machine_add');
    Route::get('/voir_machine/{id}', [MachineController::class,'show'])->name('voir_machine');
    Route::get('/generate_machine/{id}', [MachineController::class,'qrcode'])->name('generate_machine');
    Route::get('/edit_machine/{id}', [MachineController::class,'index'])->name('edit_machine');
    Route::get('/delete_machine/{id}', [MachineController::class,'delete'])->name('delete_machine');
    Route::delete('/destroy_machine/{id}', [MachineController::class,'destroy'])->name('destroy_machine');
    Route::put('/update_machine/{id}', [MachineController::class,'update'])->name('update_machine');

//***********Casque**************** */
    Route::post('/casque_add', [CasqueController::class,'store'])->name('casque_add');
    Route::get('/voir_casques/{id}', [CasqueController::class,'show'])->name('voir_casques');
    Route::get('/generate_casque/{id}', [CasqueController::class,'qrcode'])->name('generate_casque');
    Route::get('/edit_casque/{id}', [CasqueController::class,'index'])->name('edit_casque');
    Route::get('/delete_casque/{id}', [CasqueController::class,'delete'])->name('delete_casque');
    Route::delete('/destroy_casque/{id}', [CasqueController::class,'destroy'])->name('destroy_casque');
    Route::put('/update_casque/{id}', [CasqueController::class,'update'])->name('update_casque');

 //***********tele**************** */
    Route::post('/tele_add', [TeleController::class,'store'])->name('tele_add');
    Route::get('/voir_televisions/{id}', [TeleController::class,'show'])->name('voir_televisions');
    Route::get('/generate_tv/{id}', [TeleController::class,'qrcode'])->name('generate_tv');
    Route::get('/edit_television/{id}', [TeleController::class,'index'])->name('edit_television');
    Route::get('/delete_tv/{id}', [TeleController::class,'delete'])->name('delete_tv');
    Route::delete('/destroy_tv/{id}', [TeleController::class,'destroy'])->name('destroy_tv');
    Route::put('/update_tv/{id}', [TeleController::class,'update'])->name('update_tv');


 //***********onduleur**************** */
    Route::post('/onduleur_add', [OnduleurController::class,'store'])->name('onduleur_add');
    Route::get('/voir_onduleurs/{id}', [OnduleurController::class,'show'])->name('voir_onduleurs');
    Route::get('/generate_onduleur/{id}', [OnduleurController::class,'qrcode'])->name('generate_onduleur');
    Route::get('/edit_onduleur/{id}', [OnduleurController::class,'index'])->name('edit_onduleur');
    Route::get('/delete_onduleur/{id}', [OnduleurController::class,'delete'])->name('delete_onduleur');
    Route::delete('/destroy_onduleur/{id}', [OnduleurController::class,'destroy'])->name('destroy_onduleur');
    Route::put('/update_onduleur/{id}', [OnduleurController::class,'update'])->name('update_onduleur');

 //***********poste telephonique **************** */
    Route::post('/phone_add', [PhoneController::class,'store'])->name('phone_add');
    Route::get('/voir_phone/{id}', [PhoneController::class,'show'])->name('voir_phone');
    Route::get('/generate_phone/{id}', [PhoneController::class,'qrcode'])->name('generate_phone');
    Route::get('/edit_phone/{id}', [PhoneController::class,'index'])->name('edit_phone');
    Route::get('/delete_phone/{id}', [PhoneController::class,'delete'])->name('delete_phone');
    Route::delete('/destroy_phone/{id}', [PhoneController::class,'destroy'])->name('destroy_phone');
    Route::put('/update_phone/{id}', [PhoneController::class,'update'])->name('update_phone');


  //***********Video Projecteur **************** */
    Route::post('/projecteur_add', [ProjecteurController::class,'store'])->name('projecteur_add');
    Route::get('/voir_projecteur/{id}', [ProjecteurController::class,'show'])->name('voir_projecteur');
    Route::get('/generate_projecteur/{id}', [ProjecteurController::class,'qrcode'])->name('generate_projecteur');
    Route::get('/edit_projecteur/{id}', [ProjecteurController::class,'index'])->name('edit_projecteur');
    Route::get('/delete_projecteur/{id}', [ProjecteurController::class,'delete'])->name('delete_projecteur');
    Route::delete('/destroy_projecteur/{id}', [ProjecteurController::class,'destroy'])->name('destroy_projecteur');
    Route::put('/update_projecteur/{id}', [ProjecteurController::class,'update'])->name('update_projecteur');

 //***********Switch & Server **************** */
    Route::post('/server_add', [ServerController::class,'store'])->name('server_add');
    Route::get('/voir_servers/{id}', [ServerController::class,'show'])->name('voir_servers');
    Route::get('/generate_server/{id}', [ServerController::class,'qrcode'])->name('generate_server');
    Route::get('/edit_server/{id}', [ServerController::class,'index'])->name('edit_server');
    Route::get('/delete_server/{id}', [ServerController::class,'delete'])->name('delete_server');
    Route::delete('/destroy_server/{id}', [ServerController::class,'destroy'])->name('destroy_server');
    Route::put('/update_server/{id}', [ServerController::class,'update'])->name('update_server');

 //*********** Imprimante **************** */
    Route::post('/imprimante_add', [ImprimanteController::class,'store'])->name('imprimante_add');
    Route::get('/voir_imprimante/{id}', [ImprimanteController::class,'show'])->name('voir_imprimante');
    Route::get('/generate_imprimante/{id}', [ImprimanteController::class,'qrcode'])->name('generate_imprimante');
    Route::get('/edit_imprimante/{id}', [ImprimanteController::class,'index'])->name('edit_imprimante');
    Route::get('/delete_imprimante/{id}', [ImprimanteController::class,'delete'])->name('delete_imprimante');
    Route::delete('/destroy_imprimante/{id}', [ImprimanteController::class,'destroy'])->name('destroy_imprimante');
    Route::put('/update_imprimante/{id}', [ImprimanteController::class,'update'])->name('update_imprimante');

//*********** Haut Parleur **************** */
    Route::post('/hautparleur_add', [HautparleurController::class,'store'])->name('hautparleur_add');
    Route::get('/voir_hautparleur/{id}', [HautparleurController::class,'show'])->name('voir_hautparleur');
    Route::get('/generate_hautparleur/{id}', [HautparleurController::class,'qrcode'])->name('generate_hautparleur');
    Route::get('/edit_hautparleur/{id}', [HautparleurController::class,'index'])->name('edit_hautparleur');
    Route::get('/delete_hautparleur/{id}', [HautparleurController::class,'delete'])->name('delete_hautparleur');
    Route::delete('/destroy_hautparleur/{id}', [HautparleurController::class,'destroy'])->name('destroy_hautparleur');
    Route::put('/update_hautparleur/{id}', [HautparleurController::class,'update'])->name('update_hautparleur');



//*********** Ecran **************** */
    Route::post('/ecran_add', [EcranController::class,'store'])->name('ecran_add');
    Route::get('/voir_ecran/{id}', [EcranController::class,'show'])->name('voir_ecran');
    Route::get('/generate_ecran/{id}', [EcranController::class,'qrcode'])->name('generate_ecran');
    Route::get('/edit_ecran/{id}', [EcranController::class,'index'])->name('edit_ecran');
    Route::get('/delete_ecran/{id}', [EcranController::class,'delete'])->name('delete_ecran');
    Route::delete('/destroy_ecran/{id}', [EcranController::class,'destroy'])->name('destroy_ecran');
    Route::put('/update_ecran/{id}', [EcranController::class,'update'])->name('update_ecran');

//*********** Domino **************** */
    Route::post('/domino_add', [DominoController::class,'store'])->name('domino_add');
    Route::get('/voir_domino/{id}', [DominoController::class,'show'])->name('voir_domino');
    Route::get('/generate_domino/{id}', [DominoController::class,'qrcode'])->name('generate_domino');
    Route::get('/edit_domino/{id}', [DominoController::class,'index'])->name('edit_domino');
    Route::get('/delete_domino/{id}', [DominoController::class,'delete'])->name('delete_domino');
    Route::delete('/destroy_domino/{id}', [DominoController::class,'destroy'])->name('destroy_domino');
    Route::put('/update_domino/{id}', [DominoController::class,'update'])->name('update_domino');





/***********Materiel**************** */
    Route::get('/add_material', [MaterielController::class,'index'])->name('add_material');


    Route::get('/pdf/{id}', [QrcodeController::class,'qrcode_pdf'])->name('pdf');

});


