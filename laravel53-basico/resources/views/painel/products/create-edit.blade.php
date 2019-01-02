@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">
    <a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward
"></span></a> Voltar
    Gestão Produto: <b>{{ isset($product) ? $product->name : 'Novo' }}</b>
</h1>
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
    {!! Form::model($product, ['route' => ['produtos.update', $product->id],
        'class' => 'form', 'method' => 'put']) !!}
@else
    {!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
@endif
    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' 
        => 'Nome']) !!}
    </div>

    <div class="form-group">
        <label>
            {!! Form::checkbox('active') !!}
            Ativo?
        </label>
    </div>

    <div class="form-group">
        {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição do Produto']) !!}
    </div>
    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
       
{!! Form::close() !!}
@endsection