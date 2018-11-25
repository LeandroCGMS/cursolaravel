@extends("template.app")

@section("content")
<div class="col-md-12">
        <h3>Editar Contato</h3>
    </div>

    <div class="col-md-6 well">
        <form action="{{ url('/pessoas/update') }}" method="POST" class="col-md-12">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $pessoa->id }}">
           <div class="form-group col-md-12">
            <label class="control-label">Nome: </label>
            <input type="text" value="{{ $pessoa->nome }}" name="nome" placeholder="Nome" class="form-control">
           </div>
           <div class="col-md-12">
            <button style="margin-top: 5px; float: right;" class="btn btn-primary">Salvar</button>
           </div>
           
           
        </form>
    </div>

    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">{{ $pessoa->nome }}</div>
            <div class="panel-body">
                @foreach($pessoa->telefones as $telefone)
                <p><strong>Telefone: </strong>({{ $telefone->ddd }}) {{ $telefone->telefone }}</p>
                @endforeach
                
            </div>
        </div>
        </div>
    </div>
@endsection


