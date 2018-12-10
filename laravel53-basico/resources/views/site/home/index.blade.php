@extends('site.templates.template1')

@section('content')
<h1>Home Page do Site</h1>
{{-- $xss --}}
<h3>If</h3>
@if( $var1 == '1234' )
    <p>É igual</p>
@else
    <p>É diferente</p>
@endif
<h3>UnLess</h3>
@unless( $var1 == 1234 )
    <p>Não é igual... unless</p>
@endunless
<h3>For</h3>
@for( $i = 0; $i < 10; $i++ )
<p>Valor: {{ $i }}</p>
@endfor
{{--
<h3>ForEach Dentro de If pra Verificar se Array está vazio</h3>
@if(count($arrayData) > 0)
    @foreach($arrayData as $array)
    <p>Valor: {{ $array }}</p>
    @endforeach
@else
    <p>Não existem itens para serem impressos</p>
@endif
--}}
<h3>ForElse</h3>
@forelse($arrayData as $array)
<p>Valor: {{ $array }}</p>
@empty
    <p>Não existem itens para serem impressos</p>
@endforelse

@php
echo "<h4>Função PHP chamada dentro do @php do Laravel</h4>";
@endphp

@include('site.includes.sidebar', compact('var1'))


@endsection
