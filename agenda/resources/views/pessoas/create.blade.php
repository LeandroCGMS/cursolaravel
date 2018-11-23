@extends('template.app')

@section('content')
    <div class="col-md-12">
        <h3>Novo Contato</h3>
    </div>

    <div class="col-md-6 well">
        <form action="{{ url('/pessoas/store') }}" method="POST" class="col-md-12">
        {{ csrf_field() }}
           <div class="form-group">
            <label class="control-label"></label>
            <input type="text" name="nome" placeholder="Nome" class="form-control col-md-12">
           </div> 
           <button style="margin-top: 5px; float: right;" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection