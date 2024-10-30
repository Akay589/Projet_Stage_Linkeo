<?php


use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\ViewController;
use BotMan\BotMan\BotMan;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\DataPreparationController;




//Route::get('/', [App\Http\Controllers\QrcodeController::class,'Machine'])->name('/');







Route::get('/auth', [ViewController::class, 'login'])->name('/auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout_admin', [AuthController::class, 'logout_admin'])->name('logout_admin');

Route::group(['middleware'=> 'App\Http\Middleware\AdminMiddleware'], function ()
{
    Route::get('/', function () {
        return view('pages.homepage');
    });

    Route::get('/home', [ViewController::class,'home'])->name('home');
    Route::get('/add_machine', [ViewController::class,'addMachine'])->name('add_machine');













//***********Materiel**************** *
    Route::post('/materiel_add', [MaterielController::class,'store'])->name('materiel_add');
    Route::get('/voir_materiel/{id}', [MaterielController::class,'show'])->name('voir_materiel');
    Route::get('/generate_materiel/{id}', [MaterielController::class,'qrcode'])->name('generate_materiel');
    Route::get('/edit_materiel/{id}', [MaterielController::class,'index'])->name('edit_materiel');
    Route::get('/delete_materiel/{id}', [MaterielController::class,'delete'])->name('delete_materiel');
    Route::delete('/destroy_materiel/{id}', [MaterielController::class,'destroy'])->name('destroy_materiel');
    Route::put('/update_materiel/{id}', [MaterielController::class,'update'])->name('update_materiel');
    Route::get('/materiels/search', [MaterielController::class, 'search'])->name('materiels.search');
    Route::get('/fetch-ldap-users', [MaterielController::class, 'fetchUserLdap'])->name('fetch-ldap-users');
    Route::get('/add_material', [MaterielController::class,'index'])->name('add_material');
//***********End Materiel**************** *

    Route::get('/pdf/{id}', [QrcodeController::class,'qrcode_pdf'])->name('pdf');
    // Chat boat










});


Route::get('/ldap-users', [MaterielController::class, 'getUsersFromLdap']);

Route::get('/count_displayname', [MaterielController::class, 'countDisplayNames']);

Route::get('/users', [MaterielController::class, 'getAllUsers']);







