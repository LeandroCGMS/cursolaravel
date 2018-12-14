<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;
    
    public function __construct(Product $product) {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //$product = new Product(); // pode ser assim também
        $title = 'Listagem dos Produtos';
        $products = $this->product->all();
        return view('painel.products.index', compact('products','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Novo Produto';
        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products/create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->only(['name','number']));
        //dd($request->except('_token', 'category'));
        //dd($request->input('name'));
        //
        // Pega todos os dados que vêm do formulário
        $dataForm = $request->except('_token');
//        if($dataForm['active'] == null)
//            $dataForm['active'] = 0;
//        else
//            $dataForm['active'] = 1;
        $dataForm['active'] = ( !isset($dataForm['active']) ) ? 0 : 1;
        
        // Valida dos dados
        $messages = [
           'name.required'      => 'O campo nome é de preenchimento obrigatório.',
           'number.numeric'     => 'Precisa ser apenas números',
           'number.required'    =>'O campo number é de preenchimento obrigatório.',
        ];
        //$this->validate($request, $this->product->rules);
        $validate = validator($dataForm, $this->product->rules, $messages);
        if($validate->fails()){
            return redirect()
                    ->route('produtos.create')
                    ->withErrors($validate)
                    ->withInput();
        }
        
        // Faz o Cadastro
        $insert = $this->product->create($dataForm);
        
        if($insert){
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function tests() {
        /*
        $prod = $this->product;
        $prod->name = 'Nome do produto';
        $prod->number = 131231;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Description do produto aqui.';
        $insert = $prod->save();
        
        if( $insert )
            return 'Inserido com sucesso.';
        else
            return 'Falha ao inserir.';
         */
        /*
        $insert = $this->product->create([
                        'name'        =>  'Nome do produto 2',
                        'number'      => 131231,
                        'active'      => false,
                        'category'    => 'eletronicos',
                        'description' => 'Description do produto aqui.'
        ]);
        
        if( $insert )
            return "Inserido com sucesso. ID: {$insert->id}";
        else
            return 'Falha ao inserir.';
         * */
        /*
         $prod = $this->product->find(5);
         $prod->name = 'Update 2';
         $prod->number = 797890;
//         $prod->active = true;
//         $prod->category = 'eletronicos';
//         $prod->description = 'Description Update.';
         $update = $prod->save();
         if($update){
            return "<h1>Produto, ID: {$prod->id} atualizado com sucesso.</h1>";
         } else {
            return "<h1>Falha ao atualizar produto, ID: {$prod->id} atualizado com sucesso.</h1>";
         }
         * 
         */
        /*
        $prod = $this->product->find(6);
        $update = $prod->update([
                        "name"        =>  "Update do item ID 6 '
            . '- teste 'de SQL' Injection",
                        'number'      => 6764654,
                        'active'      => true
        ]);
        if($update){
            return "<h1>Produto, ID: {$prod->id} atualizado com sucesso.</h1>";
         } else {
            return "<h1>Falha ao atualizar produto, ID: {$prod->id} atualizado com sucesso.</h1>";
         }
         * 
         */
        /*
         $update = $this->product
                 ->where('number', 6764654)
                 ->update([
                        "name"        =>  "Update com Where e coluna do produto 
                            ID 6 + '
            . '- teste 'de SQL' Injection",
                        'number'      => 464646,
                        'active'      => false
        ]);
        if($update){
            return "<h1>Produto atualizado com sucesso.</h1>";
         } else {
            return "<h1>Falha ao atualizar produto.</h1>";
         }
         * 
         */
        if($prod = $this->product->where('number', 464646)->delete()){
            return "<h1>Produto, deletado com "
            . "sucesso.</h1>";
        } else {
            return "Falha ao deletar produto.</h1>";
        }
    }
}
