<?php

use App\Http\Controllers\api\MachineController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*Route::get('/', function () {
    return view('welcome');
});
*/


//Route::get('/', [App\Http\Controllers\QrcodeController::class,'Machine'])->name('/');




Route::get('/auth', [ViewController::class, 'login'])->name('/auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout_admin', [AuthController::class, 'logout_admin'])->name('/logout_admin');


    Route::get('/home', [ViewController::class,'home'])->name('/home');
    Route::get('/add_material', [ViewController::class,'addMat'])->name('add_material');
    Route::get('/liste_material', [ViewController::class,'listemat'])->name('liste_material');
    Route::post('/machine_add', [MachineController::class,'store'])->name('machine_add');
    Route::get('/voir_materiels/{id}', [MachineController::class,'show'])->name('voir_materiels');
    Route::get('/generate/{id}', [MachineController::class,'qrcode'])->name('generate');
    Route::get('/edit_material/{id}', [MachineController::class,'index'])->name('edit_material');
    Route::get('/delete/{id}', [MachineController::class,'delete'])->name('delete');
    Route::delete('/destroy/{id}', [MachineController::class,'destroy'])->name('destroy');
    Route::put('/update/{id}', [MachineController::class,'update'])->name('update');


    Route::get('/pdf/{id}', [QrcodeController::class,'qrcode_pdf'])->name('pdf');
