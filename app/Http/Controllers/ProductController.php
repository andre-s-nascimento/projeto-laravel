<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
        // middleware direto no Controller
        //$this->middleware(['auth'])
        // APENAS em
        //$this->middleware(['auth'])->only(['create','store']);
        //EXCETO em

        // $this->middleware(['auth'])->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Product::paginate(10);
        return view('admin.pages.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        //Aula 46
        $data = $request->only(['name', 'description', 'price']);

        Product::create($data);

        return redirect()->route('products.index');
        // $product = new Product;
        // $product->name = $request->name;
        // $product->save();

        //dd("OK");

        //Aula 35
        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo' => 'required|image'
        // ]);


        //Lembrar de configurar os locais de upload em config->filesystems.php e depois rodar o artisan
        // php artisan storage:link

        //dd($request->all());
        //dd($request->only(['name', 'description']));
        //dd($request->name);
        //dd($request->has('name')); //valida se o campo existe
        //dd($request->input('test', 'André'));
        //dd($request->except('_token'));
        //   if ($request->file('photo')->isValid()) {
        //dd($request->photo->getClientOriginalName());
        //dd($request->file('photo')->store('products'));
        //      $nameFile = $request->name . '.' . $request->photo->extension();
        //     dd($request->file('photo')->storeAs('products', $nameFile));
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::where('id', $id)->first();

        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }



        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\StoreUpdateProductRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        //
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }
        $product->update($request->all());

        return redirect()->route('products.index');
        //dd("Atualizando o produto: {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->where('id', $id);
        if (!$product) {
            return redirect()->back();
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}
