<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        $list_pessoas = Pessoa::all();
        return view('pessoas.index', [
            'pessoas' => $list_pessoas
        ]); // 8:24
    }
}
