<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Aula 19
Route::resource('products', 'ProductController');//->middleware(['auth']);

/*

//Aula 18
Route::delete('products/{id}', 'ProductController@destroy')->name('destroy');
Route::put('products/{id}', 'ProductController@update')->name('products.update');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
//Aula 16, 17
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/products', 'ProductController@index')->name('products.index');
*/

//Aula 14 - Grupos de Rotas

/*
Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {

            Route::name('admin.')->group(function () {

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

                Route::get('/produtos', 'TesteController@teste')->name('products');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});

*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',

], function () {
    Route::name('admin.')->group(function () {

        Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

        Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

        Route::get('/produtos', 'TesteController@teste')->name('products');

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        })->name('home');
    });
});


Route::get('/login', function () {
    return 'Login';
})->name('login');

//Aula 13 - Rotas Nomeadas
Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'Hey hey hey';
})->name('url.name');

//Aula 12 - Rotas: Redirect e View
//passando por fora do controller
Route::view('/view', 'welcome', ['id' => '6.x']);

/*
Opções de Redirect
*/

Route::redirect('redirect1', 'redirect2');
// Route::get('redirect1', function () {
//     //return 'Redirect 1';
//     return redirect('redirect2');
// });
Route::get('redirect2', function () {
    return 'Redirect 2';
});

//Aula 11 - Rotas com parâmetros
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s): {$idProduct}";
    //parametros não obrigatórios (criar default)
});

Route::get('/categorias/{flag}/posts', function ($param1) {
    return "Posts da Categoria: {$param1}";
});

Route::get('/categorias/{flag}', function ($param1) {
    return "Produtos da Categoria: {$param1}";
});

//Aula 10 - Rotas Any e Match
Route::match(['put', 'post'], '/match', function () {
    return 'Match';
}); //define tipos especificos de requisições

Route::any('/any', function () {
    return 'Any';
}); //funciona com todos os tipos de requests

//Aula 09 - Introdução a Rotas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return view('site.contact');
});

Route::get('/empresa', function () {
    return 'Sobre a empresa.';
});

Route::post('/register', function () {
    return '';
});
