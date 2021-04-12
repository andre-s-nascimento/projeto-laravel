@include('admin.includes.alerts')

@csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome:" id="" value="{{ $product->name ?? old('name')}}" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="price" placeholder="Preço:" id="" value="{{$product->price ?? old('price')}}" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="description" placeholder="Descrição:" id="" value="{{$product->description ?? old('description')}}" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
