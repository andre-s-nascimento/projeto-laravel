@extends('admin.layouts.app')

@section('title', "Editar Produto {$product->name}")

@section('content')
    <h1>Editar Produto: {{$product->name}}</h1>
    <form action="{{route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        {{-- <input type="text" name="_token" id="" value="{{csrf_token()}}"> --}}
        @method('PUT')
        @include('admin.pages.products._partials.form')
     </form>

@endsection
