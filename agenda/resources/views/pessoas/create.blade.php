@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Novo Contato</h3>
    </div>

    <div class="col-md-6 well">
        <form action="{{ url('/pessoas/store') }}" method="POST" class="col-md-12">
        {{ csrf_field() }}
           <div class="form-group col-md-12">
            <label class="control-label">Nome: </label>
            <input type="text" name="nome" placeholder="Nome" class="form-control">
           </div> 

           <div class="form-group col-md-4">
            <label class="control-label">DDD: </label>
            <input type="text" name="ddd" placeholder="DDD" class="form-control">
           </div>

           <div class="form-group col-md-8">
            <label class="control-label">Telefone: </label>
            <input type="text" name="telefone" placeholder="Telefone" class="form-control">
            <button style="margin-top: 5px; float: right;" class="btn btn-primary">Salvar</button>
           </div> 
           
        </form>
    </div>
@endsection