@extends('admin.layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto: {{$id}}</h1>
    <form action="{{route('products.update', $id) }}" method="post">
        {{-- <input type="text" name="_token" id="" value="{{csrf_token()}}"> --}}
        @method('PUT')
        @csrf
        <input type="text" name="name" placeholder="Nome:" id="">
        <input type="text" name="description" placeholder="Descrição:" id="">
        <button type="submit">Enviar</button>
    </form>

@endsection
