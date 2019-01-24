<?php

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/mentions_legales', function(){
    return view('mentions_legales');
});

Route::get('/evenementspasses', function(){
    // $event_name = DB::table('events')->get(['nom_event']);
    // return $event_name;
    return view('evenementspasses');
});

Route::get('/boutique', function () {
    $topsales_names = [
        'Teddy eXia cool',
        'Mug trop beau',
        'La daronne à Julien'
    ];
    

    return view('boutique', compact('topsales_names'));
})->name("boutique");

Route::get('/boite-a-idees', function () {
    return view('idee');
})->name("idee");

Route::get('/evenements-passes', function () {
    return view('evenementspasses');
})->name("evenementspasses");

Route::get('/inscription', function () {
    return view('inscription');
});

Route::post('Inscription','connexioncontroller@register')-> name('Inscription');

Route::post('Connexion','connexioncontroller@login')-> name('Connexion');

Route::get('Deconnexion', 'connexioncontroller@deconnexion')-> name('Deconnexion');
