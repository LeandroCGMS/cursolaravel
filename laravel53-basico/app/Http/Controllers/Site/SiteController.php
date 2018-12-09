<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct() {
        //$this->middleware('auth');
        /*
        $this->middleware('auth')
        ->only([
            'contato',
            'categoria'
        ]);
        */
        /*
        $this->middleware('auth')
        ->except([
            'index',
            'contato'
        ]);
        */
        
    }

    public function index() {
        $title = 'Título Passado por variável';
        $xss = '<script>alert("Ataque XSS");</script>';
        return view('site.home.index', compact('title','xss'));
    }

    public function contato() {
        return view('site.contact.index');
    }

    public function categoria($id){
        return "<h1>Listagem dos produtos da categoria: { $id } </h1>";
    }

    public function categoria2($id = "Valor padrão"){
        return "<h1>Listagem dos produtos da categoria: { $id } </h1>";
    }
}
