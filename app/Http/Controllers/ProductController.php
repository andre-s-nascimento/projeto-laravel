<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
        $teste = 123;
        $teste2 = 311;
        $teste3 = [1, 2, 3, 4, 5];
        $products = ['TV', 'Geladeira', 'Forno', 'Sofá'];
        return view('admin.pages.products.index', compact('teste', 'teste2', 'teste3', 'products'));
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
        dd("OK");

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
        if ($request->file('photo')->isValid()) {
            //dd($request->photo->getClientOriginalName());
            //dd($request->file('photo')->store('products'));
            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd("Editando o produto: {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
