<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin1Controller;
use App\Http\Controllers\AdminpController;
use App\Http\Controllers\MedecinController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/service', function () {
    return view('layouts.service');
});

 Route::get('/contact', function () {
     return view('layouts.contact');
 });

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});




Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'accueil'])->name('admin.dashboard');
    Route::get('liste_approvals',[AdminController::class,'liste_approvals'])->name('admin.liste_approvals');
    Route::get('liste-rendez-vous',[AdminController::class,'rdvs'])->name('admin.rdvs');
    Route::get('approve/{id}',[AdminController::class,'approve'])->name('admin.approve')->where('id', '[0-9]+');
    Route::get('emailview/{id}',[AdminController::class,'emailview'])->name('admin.emailview');
    Route::get('bloque/{id}',[AdminController::class,'bloque_debloque'])->name('admin.bloque')->where('id', '[0-9]+');


    Route::get('sendemail/{id}',[AdminController::class,'sendemail'])->name('admin.sendemail');

 });

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('accueil',[UserController::class,'accueil'])->name('user.accueil');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('detailrdv',[UserController::class,'detailrdv'])->name('user.detailrdv');
    Route::get('historique',[UserController::class,'histordv'])->name('user.histordv');
    Route::get('rendez-vous',[UserController::class,'index'])->name('user.gestrdv');


    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('user.updateInfo');
    Route::post('change-password',[UserController::class,'changePassword'])->name('user.changePassword');
    
});

Route::group(['prefix'=>'medecin', 'middleware'=>['isMedecin','auth','PreventBackHistory']], function(){
    Route::get('profile',[MedecinController::class,'accueil'])->name('medecin.profile');
    Route::get('listerdv',[MedecinController::class,'index'])->name('medecin.listerdv');
    Route::get('historique',[MedecinController::class,'histrdv'])->name('medecin.histrdv');
    Route::get('accepter/{id}',[MedecinController::class,'accepter'])->name('medecin.accepter')->where('id', '[0-9]+');
    Route::get('reporter/{id}',[MedecinController::class,'reporter'])->name('medecin.reporter')->where('id', '[0-9]+');
    Route::get('listepat',[MedecinController::class,'listepat'])->name('medecin.listepat');
    Route::get('alerte/{id}',[MedecinController::class,'alerte'])->name('medecin.alerte');
    Route::get('sendemail/{id}',[MedecinController::class,'sendemail'])->name('medecin.sendemail');


    Route::post('update-profile-info',[MedecinController::class,'updateInfo'])->name('medecin.updateInfo');
    Route::post('change-password',[MedecinController::class,'changePassword'])->name('medecin.changePassword');
    
});

Route::resource('/patients', AdminController::class);

Route::resource('/medecins', Admin1Controller::class);

Route::resource('/rendezvo', UserController::class);

Route::resource('/rendezvous', MedecinController::class);



Route::post('/rdcontroller',[RdvController::class,'AjoutRdv']);
// Route::resource('/rendezvous',RdvController::class);
