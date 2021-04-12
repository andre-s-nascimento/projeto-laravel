@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    </ul>
    @endif

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        {{-- <input type="text" name="_token" id="" value="{{csrf_token()}}"> --}}
        @csrf
        <input type="text" name="name" placeholder="Nome:" id="">
        <input type="text" name="description" placeholder="Descrição:" id="">
        <input type="file" name="photo" id="">
        <button type="submit">Enviar</button>
    </form>

@endsection
