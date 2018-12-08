<?php

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){
    Route::get('/users', function(){
        return 'Controle de Usuários';
    });
    Route::get('/financeiro', function(){
        return 'Financeiro Painel';
    });
    Route::get('/', function(){
        return '<h1>Dashboard do Painel</h1>';
    });
});

Route::get('login', function(){
    return '<h1>Página de Formulário Fictício de Login</h1>';
});

Route::get('/categoria2/{idCat?}', function($idCat='valor padrão'){
    return "Posts da categoria {$idCat}";
});

Route::get('/categoria/{idCategoria}/nome-fixo/{prm2}', function($idCat, $prm2){
    return "Posts da categoria {$idCat} - {$prm2}";
});

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
