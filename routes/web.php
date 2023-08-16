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
Route::get('/agence/a-propos', [App\Http\Controllers\User\AgenceController::class, 'about'])->name('agence.about');
Route::get('/agence-create', [App\Http\Controllers\User\AgenceController::class, 'create'])->name('agence.create');
// Route::get('/agence/show/{slug}', [App\Http\Controllers\User\AgenceController::class, 'show'])->name('agence.show');
Route::post('/agence/store', [App\Http\Controllers\User\AgenceController::class, 'store'])->name('agence.store');
Route::post('/agence/search', [App\Http\Controllers\User\AgenceController::class, 'search'])->name('agence.search');
Route::get('/region/{slug}', [App\Http\Controllers\User\AgenceController::class, 'region'])->name('agence.region');

Route::get('/setting', [App\Http\Controllers\User\SettingController::class, 'index'])->name('setting.index');
Route::get('/conditions', [App\Http\Controllers\User\SettingController::class, 'condition'])->name('setting.condition');
Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [App\Http\Controllers\User\ContactController::class, 'store'])->name('contact.store');
Route::post('/contact/post', [App\Http\Controllers\User\ContactController::class, 'post'])->name('contact.post');

Route::get('/contact/desaboner', [App\Http\Controllers\User\ContactController::class, 'desaboner'])->name('contact.desaboner');
Route::put('/contact/dislogin', [App\Http\Controllers\User\ContactController::class, 'dislogin'])->name('contact.dislogin');

Route::get('/client', [App\Http\Controllers\User\ClientController::class, 'index'])->name('client.index');
Route::get('/client-create', [App\Http\Controllers\User\ClientController::class, 'register'])->name('client.register');
Route::post('/client/store', [App\Http\Controllers\User\ClientController::class, 'store'])->name('client.store');
Route::get('/token/confirm/{id}/{token}', [App\Http\Controllers\User\ClientController::class, 'confirm'])->name('customer.confirm');
Route::post('/client/colis', [App\Http\Controllers\User\ClientController::class, 'colis'])->name('client.colis');
Route::put('/client/confirme/{id}', [App\Http\Controllers\User\ClientController::class, 'confirme'])->name('colis.confirme');

Route::get('/store', [App\Http\Controllers\User\HomeController::class, 'store'])->name('store');

Auth::routes();

Route::get('/confirm/{id}/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'confirm']);
Route::get('/paiment/{id}/{token}', [App\Http\Controllers\Admin\ClientController::class, 'paiment']);



Route::middleware('isAdmin')->prefix('/admin')->name('admin.')->group(function() 
{
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('/admin', App\Http\Controllers\Admin\AdminController::class);
    Route::put('/admin/updateCustomer/{id}', [App\Http\Controllers\Admin\AdminController::class,'updateCustomer'])->name('admin.updateCustomer'); 
    Route::resource('/agence', App\Http\Controllers\Admin\AgenceController::class);
    Route::resource('/partenaire', App\Http\Controllers\Admin\PartController::class);
    Route::resource('/contact',App\Http\Controllers\Admin\ContactController::class);

    Route::get('/profil/show/{slug}', [App\Http\Controllers\Admin\ProfilController::class,'show'])->name('profil.show'); 
    Route::put('/profil/update/{slug}', [App\Http\Controllers\Admin\ProfilController::class,'update'])->name('profil.update');   
});

Route::prefix('/agence')->name('agence.')->group(function() 
{
    Route::get('/home', [App\Http\Controllers\Agence\HomeController::class, 'index'])->name('home');

    Route::get('/about', [App\Http\Controllers\Agence\AboutController::class, 'index'])->name('about.index');
    Route::put('/about', [App\Http\Controllers\Agence\AboutController::class, 'about'])->name('about.about');
    Route::put('/motivation', [App\Http\Controllers\Agence\AboutController::class, 'motivation'])->name('about.motivation');
    Route::put('/ticket', [App\Http\Controllers\Agence\AboutController::class, 'ticket'])->name('about.ticket');
    Route::put('/bagagec', [App\Http\Controllers\Agence\AboutController::class, 'bagagec'])->name('about.bagagec');
    Route::put('/personne', [App\Http\Controllers\Agence\AboutController::class, 'personne'])->name('about.personne');
    Route::put('/villeArret', [App\Http\Controllers\Agence\AboutController::class, 'villeArret'])->name('about.villeArret');
    
    Route::resource('/siege', App\Http\Controllers\Agence\SiegeController::class);
    Route::resource('/agent', App\Http\Controllers\Agence\AgentController::class);
    Route::put('/agent/edite/{id}', [App\Http\Controllers\Agence\AgentController::class,'edite'])->name('agent.edite');
    // Route::get('/paiment/{id}/{token}', [App\Http\Controllers\Agence\ClientController::class, 'paiment']);

    Route::get('/profil/show/{slug}', [App\Http\Controllers\Agence\ProfilController::class,'show'])->name('profil.show'); 
    Route::put('/profil/update/{slug}', [App\Http\Controllers\Agence\ProfilController::class,'update'])->name('profil.update');
    

    // login des agence
        Route::get('/login','App\Http\Controllers\Agence\Auth\LoginController@showLoginForm')->name('agence.login');
        Route::post('/login',[App\Http\Controllers\Agence\Auth\LoginController::class, 'login'])->name('agence.login');
        Route::post('/logout',[App\Http\Controllers\Agence\Auth\LoginController::class, 'logout'])->name('agence.logout');
    // fin des login agence

    // Forgot password des agences
        Route::get('/password/reset','App\Http\Controllers\Agence\Auth\ForgotPasswordController@reset')->name('password.reset');
        Route::post('/password/verify','App\Http\Controllers\Agence\Auth\ForgotPasswordController@verify')->name('password.verify');
        Route::get('/confirm/{id}/{email}','App\Http\Controllers\Agence\Auth\ForgotPasswordController@confirm')->name('password.confirm');
        Route::put('/update/{email}','App\Http\Controllers\Agence\Auth\ForgotPasswordController@update')->name('password.update');
    // And forgot password agences
});

Route::prefix('/agent')->name('agent.')->group(function() 
{
    Route::get('/home', [App\Http\Controllers\Agent\HomeController::class, 'index'])->name('home');
    Route::get('/confirm/{id}/{token}', [App\Http\Controllers\Agent\HomeController::class, 'confirm']);

    Route::resource('/client', App\Http\Controllers\Agent\ClientController::class);
    Route::get('/client/ticker/{id}', [App\Http\Controllers\Agent\ClientController::class, 'ticker'])->name('ticker');
    Route::get('/client/jour/{id}', [App\Http\Controllers\Agent\ClientController::class, 'jour'])->name('client.jour');
    Route::put('/presence', [App\Http\Controllers\Agent\ClientController::class,'presence'])->name('client.presence'); 
    Route::get('/annuler', [App\Http\Controllers\Agent\ClientController::class, 'annuler'])->name('renoncer');
    Route::post('/remboursement', [App\Http\Controllers\Agent\ClientController::class, 'rembourser'])->name('rembourser');
    // Route::get('/absent', [App\Http\Controllers\Agent\ClientController::class, 'absent'])->name('absent');
    Route::get('/send-message', [App\Http\Controllers\Agent\ClientController::class, 'send_sms'])->name('send_sms');
    

    Route::resource('/bus', App\Http\Controllers\Agent\BusController::class);
    Route::resource('/itineraire', App\Http\Controllers\Agent\ItineraireController::class);
    Route::resource('/ville', App\Http\Controllers\Agent\VilleController::class);

    Route::resource('/bagage', App\Http\Controllers\Agent\BagageController::class); 
    Route::resource('/colis', App\Http\Controllers\Agent\ColiController::class);
    Route::post('/colis/post', [App\Http\Controllers\Agent\ColiController::class,'post'])->name('colis.post');
    Route::post('/colis/cutomer', [App\Http\Controllers\Agent\ColiController::class,'customer'])->name('colis.customer');
    Route::put('/colis/updateColi/{id}', [App\Http\Controllers\Agent\ColiController::class,'updateColi'])->name('colis.updateColi');
    Route::delete('/colis/delete/{id}', [App\Http\Controllers\Agent\ColiController::class,'delete'])->name('colis.delete');

    Route::resource('/contact',App\Http\Controllers\Agent\ContactController::class);


    Route::get('/profil/show/{slug}', [App\Http\Controllers\Agent\ProfilController::class,'show'])->name('profil.show'); 
    Route::put('/profil/update/{slug}', [App\Http\Controllers\Agent\ProfilController::class,'update'])->name('profil.update');
    
    Route::put('/profil/sendSms/{id}', [App\Http\Controllers\Agent\ProfilController::class,'sendSms'])->name('profil.sendSms');
    Route::put('/profil/sendApi/{id}', [App\Http\Controllers\Agent\ProfilController::class,'sendApi'])->name('profil.sendApi');
    
    Route::put('/profil/ActiveOmg/{id}', [App\Http\Controllers\Agent\ProfilController::class,'activeOmg'])->name('profil.activeOmg');
    Route::put('/profil/sendOmg/{id}', [App\Http\Controllers\Agent\ProfilController::class,'sendOmg'])->name('profil.sendOmg');

    // login des agent
        Route::get('/login','App\Http\Controllers\Agent\Auth\LoginController@showLoginForm')->name('agent.login');
        Route::post('/login','App\Http\Controllers\Agent\Auth\LoginController@login')->name('agent.login');
        Route::post('/logout','App\Http\Controllers\Agent\Auth\LoginController@logout')->name('agent.logout');
    // fin des login agent

    // Forgot password des agents
        Route::get('/password/reset','App\Http\Controllers\Agent\Auth\ForgotPasswordController@reset')->name('password.reset');
        Route::post('/password/verify','App\Http\Controllers\Agent\Auth\ForgotPasswordController@verify')->name('password.verify');
        Route::get('/confirm/{id}/{email}','App\Http\Controllers\Agent\Auth\ForgotPasswordController@confirm')->name('password.confirm');
        Route::put('/update/{email}','App\Http\Controllers\Agent\Auth\ForgotPasswordController@update')->name('password.update');
    // And forgot password agents
});

Route::prefix('/customer')->name('customer.')->group(function() 
{
    Route::get('/home', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
    Route::get('/confirm/{id}/{token}', [App\Http\Controllers\Client\HomeController::class, 'confirm']);
    Route::get('/agence', [App\Http\Controllers\Client\AgenceController::class, 'index'])->name('agence.index');
    Route::get('/agence/about/{slug}', [App\Http\Controllers\Client\AgenceController::class, 'about'])->name('agence.about');
    Route::get('/agence/show/{slug}', [App\Http\Controllers\Client\AgenceController::class, 'show'])->name('agence.show');
    Route::post('/agence/search', [App\Http\Controllers\Client\AgenceController::class, 'search'])->name('agence.search');
    Route::get('/agence/region/{slug}', [App\Http\Controllers\Client\AgenceController::class, 'region'])->name('agence.region');

    Route::post('/client/store', [App\Http\Controllers\Client\ClientController::class, 'store'])->name('client.store');
    Route::post('/client/sendmail/{id}', [App\Http\Controllers\Client\ClientController::class, 'edit'])->name('client.edit');
    Route::get('/client/show', [App\Http\Controllers\Client\ClientController::class, 'show'])->name('client.show');
    Route::put('/client/update/{id}', [App\Http\Controllers\Client\ClientController::class, 'update'])->name('client.update');
    // Route::get('client/paiment', [App\Http\Controllers\Client\ClientController::class, 'paiment'])->name('client.paiment');
    Route::put('/client/annuler/{id}', [App\Http\Controllers\Client\ClientController::class, 'annuler'])->name('client.annuler');
    Route::put('/client/renew/{id}', [App\Http\Controllers\Client\ClientController::class, 'renew'])->name('client.renew');
    Route::put('/client/revente/{id}', [App\Http\Controllers\Client\ClientController::class, 'revente'])->name('client.revente');
    Route::delete('/client/destroy/{id}', [App\Http\Controllers\Client\ClientController::class, 'destroy'])->name('client.destroy');

    // Controller de payment des ticket
    Route::resource('/ticket', App\Http\Controllers\Client\PaymentController::class);

    Route::resource('/bagage', App\Http\Controllers\Client\BagageController::class); 
    Route::resource('/colis', App\Http\Controllers\Client\ColiController::class);
    // Route::get('/store', [App\Http\Controllers\Client\HomeController::class, 'store'])->name('store');


    Route::get('/profil/show/{slug}', [App\Http\Controllers\Client\ProfilController::class,'show'])->name('profil.show'); 
    Route::put('/profil/update/{slug}', [App\Http\Controllers\Client\ProfilController::class,'update'])->name('profil.update');
    


    // login des customer
        Route::get('/login','App\Http\Controllers\Client\Auth\LoginController@showLoginForm')->name('customer.login');
        Route::post('/login','App\Http\Controllers\Client\Auth\LoginController@login')->name('customer.login');
        Route::post('/logout','App\Http\Controllers\Client\Auth\LoginController@logout')->name('customer.logout');
    // fin des login customer

    // Forgot password des customers
        Route::get('/password/reset','App\Http\Controllers\Client\Auth\ForgotPasswordController@reset')->name('password.reset');
        Route::post('/password/verify','App\Http\Controllers\Client\Auth\ForgotPasswordController@verify')->name('password.verify');
        Route::get('/confirm/{id}/{email}','App\Http\Controllers\Client\Auth\ForgotPasswordController@confirm')->name('password.confirm');
        Route::put('/update/{email}','App\Http\Controllers\Client\Auth\ForgotPasswordController@update')->name('password.update');
    // And forgot password clients
});