<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);

Route::auth();

Route::get('/', 'FrenteLojaController@getIndex');

Route::get('sobre', [
    'as' => 'sobre',
    'uses' => 'FrenteLojaController@getSobre'
]);
Route::get('pagseguro/checkout', [
    'as' => 'pagseguro.checkout',
    'uses' => 'PedidoController@postCheckout'
]);
Route::get('categoria/{id?}', [
    'as' => 'categoria.listar',
    'uses' => 'CategoriaController@getCategoria'
]);
Route::get('marca/{id?}', [
    'as' => 'marca.listar',
    'uses' => 'MarcaController@getMarca'
]);

/*
 * ATENÇÃO para esta rota, ela deve estar antes de produto/{id}
 * para funcionar
 */
Route::any('produto/buscar', [
    'as' => 'produto.buscar',
    'uses' => 'ProdutoController@getBuscar'
]);
Route::get('produto/{id}', [
    'as' => 'produto.detalhes',
    'uses' => 'ProdutoController@getProdutoDetalhes'
]);
Route::get('imagem/arquivo/{nome}', [
    'as' => 'imagem.file',
    'uses' => 'ImagemController@getImagemFile'
]);

Route::any('carrinho/adicionar/{id}', [
    'as' => 'carrinho.adicionar',
    'uses' => 'CarrinhoController@anyAdicionar'
]);

Route::get('carrinho', [
    'as' => 'carrinho.listar',
    'uses' => 'CarrinhoController@getListar'
]);

Route::get('carrinho/esvaziar', [
    'as' => 'carrinho.esvaziar',
    'uses' => 'CarrinhoController@getEsvaziar'
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('carrinho/finalizar-compra', [
        'as' => 'carrinho.finalizar-compra',
        'uses' => 'CarrinhoController@getFinalizarCompra'
    ]);

    Route::get('cliente/dashboard', [
        'as' => 'cliente.dashboard',
        'uses' => 'ClienteController@getDashboard'
    ]);

    Route::get('cliente/pedidos/{id?}', [
        'as' => 'cliente.pedidos',
        'uses' => 'ClienteController@getPedidos'
    ]);
    Route::get('cliente/perfil', [
        'as' => 'cliente.perfil',
        'uses' => 'ClienteController@getPerfil'
    ]);
    Route::any('cliente/avaliar/{id}', [
        'as' => 'cliente.avaliar',
        'uses' => 'ClienteController@postAvaliar'
    ]);

    Route::get('admin', [
        'as' => 'admin',
        'uses' => 'AdminController@getDashboard'
    ]);
    Route::get('admin/dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@getDashboard'
    ]);
    Route::put('admin/pedido/pago/{id}', [
        'as' => 'admin.pedido.pago',
        'uses' => 'AdminController@putPedidoPago'
    ]);
    Route::put('admin/pedido/finalizado/{id}', [
        'as' => 'admin.pedido.finalizado',
        'uses' => 'AdminController@putPedidoFinalizado'
    ]);
    Route::get('admin/pedidos/{id?}', [
        'as' => 'admin.pedidos',
        'uses' => 'AdminController@getPedidos'
    ]);
    Route::get('admin/perfil', [
        'as' => 'admin.perfil',
        'uses' => 'AdminController@getPerfil'
    ]);
    Route::get('admin/marca', [
        'as' => 'admin.marca',
        'uses' => 'MarcaController@listar'
    ]);
    Route::get('admin/categoria', [
        'as' => 'admin.categoria',
        'uses' => 'CategoriaController@listar'
    ]);

     Route::get('admin/produto', [
        'as' => 'admin.produto',
        'uses' => 'ProdutoController@listar'
    ]);

    Route::get('admin/marca/novo','MarcaController@novo');
    Route::post('admin/marca/adiciona','MarcaController@adiciona');
    Route::get('admin/marcas/excluir/{id?}','MarcaController@excluir');
    Route::post('admin/marcas/destroy','MarcaController@destroy');
    Route::get('admin/marcas/editar/{id?}','MarcaController@alterar');
    Route::post('admin/marcas/salvar','MarcaController@salvar');

    Route::get('admin/categorias/nova','CategoriaController@nova');
    Route::post('admin/categoria/adiciona','CategoriaController@adiciona');
    Route::get('admin/categorias/editar/{id?}','CategoriaController@alterar');
    Route::post('admin/categorias/salvar','CategoriaController@salvar');
    Route::get('admin/categorias/excluir/{id?}','CategoriaController@excluir');
    Route::post('admin/categorias/destroy','CategoriaController@destroy');

    Route::get('admin/produtos/novo','ProdutoController@novo');
    Route::post('admin/produto/adiciona','ProdutoController@adiciona');
    Route::get('admin/produtos/excluir/{id?}','ProdutoController@excluir');
    Route::post('admin/produtos/destroy','ProdutoController@destroy');
    Route::get('admin/produtos/editar/{id?}','ProdutoController@alterar');
    Route::post('admin/produtos/salvar','ProdutoController@salvar');


});


//Route::get('/home', 'HomeController@index');
