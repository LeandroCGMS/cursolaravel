@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">Gestão de Produtos</h1>
@if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
        <p>
            {{ $error }}
        </p>
        @endforeach
    </div>
@endif
@if( isset($product) )
    <form class="form" method="post" action="{{ route('produtos.update', $product->id) }}">
        {!! method_field('PUT') !!}
@else
    <form class="form" method="post" action="{{ route('produtos.store') }}">
@endif

    <!--<input type="hidden" value="{{ csrf_token() }}" name="_token">-->
    {!! csrf_field() !!}
    <div class="form-group">
        <input type='text' name='name' placeholder="Nome:" class="form-control" 
               value="{{ isset($product)?$product->name:old('name') }}">
    </div>

    <div class="form-group">
        <label>
            <input type='checkbox' name='active' value="1" 
                   @if(isset($product) && $product->active == '1')checked @endif>
            Ativo?
        </label>
    </div>

    <div class="form-group">
        <input type='number' min="0" name='number' placeholder="Número:" class="form-control"
               value="{{ isset($product)?$product->number:old('number') }}">
    </div>

    <div class="form-group">
        <select name="category" class="form-control">
            <option value="">Escolha a Categoria</option>
            @foreach($categories as $category)
            <option  class="form-control" value="{{ $category }}"
                     @if( isset($product) && $product->category == $category)
                        selected
                     @endif
                     >{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <textarea name="description" class="form-control" placeholder="Descrição do Produto">
        {{ isset($product) ? $product->description : old('description')}}</textarea>
    </div>

    <button class="btn btn-primary">Enviar</button>
       
</form>
@endsection