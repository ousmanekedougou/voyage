<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

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



Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\User\AboutController::class, 'index'])->name('about.index');
Route::get('/agence', [App\Http\Controllers\User\AgenceController::class, 'index'])->name('agence.index');
Route::get('/agence/create', [App\Http\Controllers\User\AgenceController::class, 'create'])->name('agence.create');
Route::get('/agence/show/{slug}', [App\Http\Controllers\User\AgenceController::class, 'show'])->name('agence.show');
Route::post('/agence/store', [App\Http\Controllers\User\AgenceController::class, 'store'])->name('agence.store');
Route::post('/agence/search', [App\Http\Controllers\User\AgenceController::class, 'search'])->name('agence.search');
Route::get('/setting', [App\Http\Controllers\User\SettingController::class, 'index'])->name('setting.index');
Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [App\Http\Controllers\User\ContactController::class, 'store'])->name('contact.store');
Route::post('/contact/post', [App\Http\Controllers\User\ContactController::class, 'post'])->name('contact.post');
Route::get('/client', [App\Http\Controllers\User\ClientController::class, 'index'])->name('client.index');
Route::post('/client/store', [App\Http\Controllers\User\ClientController::class, 'store'])->name('client.store');
Route::post('/client/sendmail/{id}', [App\Http\Controllers\User\ClientController::class, 'edit'])->name('client.edit');
Route::get('/client/{id}', [App\Http\Controllers\User\ClientController::class, 'show'])->name('client.show');
Route::put('/client/update/{id}', [App\Http\Controllers\User\ClientController::class, 'update'])->name('client.update');
Route::put('/client/bagage/{id}', [App\Http\Controllers\User\ClientController::class, 'bagage'])->name('client.bagage');
Route::put('/client/colis/{id}', [App\Http\Controllers\User\ClientController::class, 'colis'])->name('client.colis');
Route::get('/store', [App\Http\Controllers\User\HomeController::class, 'store'])->name('store');

Auth::routes();
Route::get('/confirm/{id}/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'confirm']);
Route::get('/paiment/{id}/{token}', [App\Http\Controllers\Admin\ClientController::class, 'paiment']);



Route::prefix('/admin')->name('admin.')->group(function() 
{
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('/admin', App\Http\Controllers\Admin\AdminController::class);
    Route::resource('/agence', App\Http\Controllers\Admin\AgenceController::class);
    Route::resource('/siege', App\Http\Controllers\Admin\SiegeController::class);
    Route::resource('/agent', App\Http\Controllers\Admin\AgentController::class);
    Route::put('/agent/edite/{id}', [App\Http\Controllers\Admin\AgentController::class,'edite'])->name('agent.edite');
    Route::resource('/bus', App\Http\Controllers\Admin\BusController::class);
    Route::resource('/itineraire', App\Http\Controllers\Admin\ItineraireController::class);
    Route::resource('/depart', App\Http\Controllers\Admin\DepartController::class);
    Route::resource('/ville', App\Http\Controllers\Admin\VilleController::class);
    Route::resource('/client', App\Http\Controllers\Admin\ClientController::class);
    Route::resource('/partenaire', App\Http\Controllers\Admin\PartController::class);
    Route::get('/historique/show/{id}', [App\Http\Controllers\Admin\HistoriqueController::class,'show'])->name('historique.show');
    Route::post('/historique/search', [App\Http\Controllers\Admin\HistoriqueController::class,'search'])->name('historique.search');
    Route::put('/historique/rembourser/{id}', [App\Http\Controllers\Admin\HistoriqueController::class,'rembourser'])->name('historique.rembourser');
    Route::put('/client/presence/{id}', [App\Http\Controllers\Admin\ClientController::class,'presence'])->name('client.presence'); 
    Route::put('/client/payer/{id}', [App\Http\Controllers\Admin\ClientController::class, 'payer'])->name('payer');
    Route::get('/client/ticker/{id}', [App\Http\Controllers\Admin\ClientController::class, 'ticker'])->name('ticker');
    Route::get('/profil/show/{slug}', [App\Http\Controllers\Admin\ProfilController::class,'show'])->name('profil.show'); 
    Route::put('/profil/update/{slug}', [App\Http\Controllers\Admin\ProfilController::class,'update'])->name('profil.update');
    Route::put('/profil/sendSms/{id}', [App\Http\Controllers\Admin\ProfilController::class,'sendSms'])->name('profil.sendSms');
    Route::put('/profil/sendApi/{id}', [App\Http\Controllers\Admin\ProfilController::class,'sendApi'])->name('profil.sendApi');
    Route::resource('/bagage', App\Http\Controllers\Admin\BagageController::class); 
    Route::resource('/colis', App\Http\Controllers\Admin\ColiController::class);
    Route::resource('/contact',App\Http\Controllers\Admin\ContactController::class); 
});