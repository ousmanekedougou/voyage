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
Route::post('/agence/store', [App\Http\Controllers\User\AgenceController::class, 'store'])->name('agence.store');
Route::get('/setting', [App\Http\Controllers\User\SettingController::class, 'index'])->name('setting.index');
Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [App\Http\Controllers\User\ContactController::class, 'store'])->name('contact.store');
Route::post('/client', [App\Http\Controllers\User\ClientController::class, 'store'])->name('client.store');
Route::get('/show/{slug}', [App\Http\Controllers\User\HomeController::class, 'show'])->name('show');
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
    Route::resource('/bus', App\Http\Controllers\Admin\BusController::class);
    Route::resource('/itineraire', App\Http\Controllers\Admin\ItineraireController::class);
    Route::resource('/depart', App\Http\Controllers\Admin\DepartController::class);
    Route::resource('/ville', App\Http\Controllers\Admin\VilleController::class);
    Route::resource('/client', App\Http\Controllers\Admin\ClientController::class);
    Route::resource('/partenaire', App\Http\Controllers\Admin\PartController::class);
    Route::get('/historique', [App\Http\Controllers\Admin\HistoriqueController::class,'index'])->name('historique.index');
    Route::post('/historique/search', [App\Http\Controllers\Admin\HistoriqueController::class,'search'])->name('historique.search');
    Route::put('/client/presence/{id}', [App\Http\Controllers\Admin\ClientController::class,'presence'])->name('client.presence'); 
    Route::put('/client/payer/{id}', [App\Http\Controllers\Admin\ClientController::class, 'payer'])->name('payer');
    Route::get('/profil/show/{slug}', [App\Http\Controllers\Admin\ProfilController::class,'show'])->name('profil.show'); 
    Route::put('/profil/update/{slug}', [App\Http\Controllers\Admin\ProfilController::class,'update'])->name('profil.update'); 
});