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
        $var1 = '123';
        $arrayData = []; // [1,2,3,4,5,6,7,8,9]
        return view('site.home.index', compact('title','xss', 'var1','arrayData'));
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
