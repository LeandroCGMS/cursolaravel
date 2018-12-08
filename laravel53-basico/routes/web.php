<?php

Route::get('nome1/nome2/nome7', function(){
    return 'Rota grande';
})->name('rota.nomeada');;

Route::any('/any', function(){
    return 'Route Any';
});

Route::match(['get', 'post'], '/match', function(){
   return 'Route match' ;
});

Route::post('/post', function() {
   return 'Route Post';
});

Route::get('/contato', function(){
   return "Contato";
});

Route::get('/empresa',function(){
    return view('empresa');
});

Route::get('/', function () {
    return redirect()->route('rota.nomeada');
});
