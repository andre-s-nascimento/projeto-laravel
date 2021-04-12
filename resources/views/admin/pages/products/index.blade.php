@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
<h1> Exibindo os Produtos</h1>
<a href="{{route('products.create')}}" class="btn btn-primary">Cadastrar</a>
<hr>
<table class="table table-bordered table-sm table-striped">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                <a href="{{ route('products.edit', $product->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $products->links() !!}

@endsection
