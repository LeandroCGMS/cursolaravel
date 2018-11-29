@extends("template.app")

@section("content")
<style>
    .btn-action {
        padding: 5px;
        margin-left: 5px;
        float: right;
    }
</style>

<div>
    <div class="col-sm-12 btn-group btn-group-justified" 
    style="padding-bottom: 10px;">
        @foreach(range('A','Z') as $letra)
            <div class="btn-group">
                <a href="{{ url('pessoas/' . $letra) }}" class="btn btn-primary {{ $letra === $criterio ? 'disabled' : '' }}">
                    {{ $letra }}
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        <h1 class="col-sm-8">Critério: {{ $criterio }}</h1>
        
    </div>  

    <div class="row">
        <h1 class="col-sm-8"></h1>
        
        <form action="{{ url('/pessoas/busca') }}" method="post">
            <div style="margin-top: 0px;" class="col-sm-4 input-group mb-3">
            {{ csrf_field() }}
                <input type="text" class="form-control" name="criterio" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary" type="button">Ok</button>
                    </div>
            </div>
        </form>    
    </div> 

    @foreach($pessoas as $pessoa)
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
            {{ $pessoa->nome }}
            <a href="{{ url("/pessoas/$pessoa->id/editar") }}" class="btn btn-xs btn-primary btn-action">
            <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="{{ url("/pessoas/$pessoa->id/excluir") }}" class="btn btn-xs btn-danger btn-action">
            <i class="glyphicon glyphicon-trash"></i>
            </a>
            </div>
            <div class="panel-body">
                @foreach($pessoa->telefones as $telefone)
                <p><strong>Telefone: </strong>({{ $telefone->ddd }}) {{ $telefone->telefone }}</p>
                @endforeach
                
            </div>
        </div>
        </div>
    </div>
    @endforeach
</div>
@endsection