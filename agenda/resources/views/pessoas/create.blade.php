@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Novo Contato</h3>
    </div>

    <div class="col-md-6 well">
        <form action="{{ url('/pessoas/store') }}" method="POST" class="col-md-12">
        {{ csrf_field() }}
           <div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
            <label class="control-label">Nome: </label>
            <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="form-control">
            @if($errors->has('nome'))
                <span class="help-block">
                {{ $errors->first('nome') }}
                </span>
            @endif
           </div> 

           <div class="form-group col-md-4 {{ $errors->has('ddd') ? 'has-error' : '' }}">
            <label class="control-label">DDD: </label>
            <input type="text" name="ddd" value="{{ old('ddd') }}" placeholder="DDD" class="form-control">
            @if($errors->has('ddd'))
                <span class="help-block">
                {{ $errors->first('ddd') }}
                </span>
            @endif
           </div>

           <div class="form-group col-md-8 {{ $errors->has('telefone') ? 'has-error' : '' }}">
            <label class="control-label">Telefone: </label>
            <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class="form-control">
            <button style="margin-top: 5px; float: right;" class="btn btn-primary">Salvar</button>
            @if($errors->has('telefone'))
                <span class="help-block">
                {{ $errors->first('telefone') }}
                </span>
            @endif
           </div> 
           
        </form>
    </div>
@endsection