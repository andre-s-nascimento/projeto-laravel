@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
<h1> Exibindo os Produtos</h1>

<a href="{{route('products.create')}}">Cadastrar</a>

<hr>

@component('admin.components.card')
    @slot('title')
    <h1>Título Card</h1>
    @endslot

    Um card de exemplo
@endcomponent

<hr>

@include('admin.includes.alerts', ['content'=>'Alerta de preços de produtos'])



@if(isset($products))
    @foreach ($products as $product)
    {{-- <p class="@if ($loop->last) last" @endif >{{$product}}</p> --}}
    <p class="@if ($loop->last) last @endif">{{$product}}</p>
    @endforeach
@endif

<hr>

@forelse ($products as $product)
<p class="@if ($loop->first) last @endif"> {{$product}}</p>
@empty
    <p>Não existem produtos cadastrados</p>
@endforelse
<hr>

@if ($teste==='123')
<p>É Igual</p>
@elseif ($teste===123)
<p>É Igual a 123</p>
@else
<p>É Diferente</p>
@endif

@unless ($teste==='123')
<p>Unless True</p>
@else
<p>Unless False</p>
@endunless

@isset($teste2)
<p>{{ $teste2 }}</p>

@endisset

@empty($teste3)
<p>Vazio...</p>
@endempty

@auth
    <p>Autenticado</p>
    @else
    <p>Não Autenticado</p>
@endauth

@guest
    <p>Não Autenticado</p>
@endguest

@switch($teste)
    @case(1)
    <p>É igual a 1</p>
    @break
    @case(2)
    <p>É igual a 2</p>
    @break
    @case(123)
    <p>É igual a 123</p>
    @break

    @default
    <p>DEFAULT</p>

@endswitch

@endsection

@push('styles')
<style>
    .last {background: #ccc;}
</style>

@endpush

@push('scripts')
<script>
    document.body.style.background = "#c0c0c0"
</script>
@endpush
