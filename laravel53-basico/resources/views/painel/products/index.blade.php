@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">{{ isset($title) ? $title : '' }}</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary btn-add">
        <span class="glyphicon glyphicon-plus">
        </span> &nbsp;Cadastrar
    </a>
<table class=" table table-striped">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th width="100px">Ações</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>
            <a href="{{route('produtos.edit', $product->id)}}" class="edit actions">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('produtos.show', $product->id)}}" class="bg-success">
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
        </td>
    </tr> 
    @endforeach
</table>
    {!! $products->links() !!}
@endsection
