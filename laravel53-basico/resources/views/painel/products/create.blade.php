@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">Gestão de Produtos</h1>
<form class="form" method="post" action="{{ route('produtos.store') }}">
    <!--<input type="hidden" value="{{ csrf_token() }}" name="_token">-->
    {!! csrf_field() !!}
    <div class="form-group">
        <input type='text' name='name' placeholder="Nome:" class="form-control">
    </div>

    <div class="form-group">
        <label>
            <input type='checkbox' name='active' value="1">
            Ativo?
        </label>
    </div>

    <div class="form-group">
        <input type='number' min="0" name='number' placeholder="Número:" class="form-control">
    </div>

    <div class="form-group">
        <select name="category" class="form-control">
            <option>Escolha a Categoria</option>
            @foreach($categories as $category)
            <option  class="form-control" value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <textarea name="description" placeholder="Descrição do Produto"></textarea>
    </div>



    <button class="btn btn-primary">Cadastrar</button>
</form>
@endsection