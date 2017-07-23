<?php

// Admin routes
//$router->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function($router)
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', function () {
        return view('admin.index');
    })->name('content.index');
    /*
     * Home
     */
    Route::get('page/home', 'PageHomeController@index')->name('content.home.index');
    Route::put('page/home', 'PageHomeController@update')->name('content.home.update');
    Route::get('page/uniformes-banner', 'PageUniformesBannerController@index')->name('content.uniformes.banner.index');
    Route::put('page/uniformes-banner', 'PageUniformesBannerController@update')->name('content.uniformes.banner.update');
    Route::get('page/camisaria-banner', 'PageCamisariaBannerController@index')->name('content.camisaria.banner.index');
    Route::put('page/camisaria-banner', 'PageCamisariaBannerController@update')->name('content.camisaria.banner.update');

    /*
     * Contato
     */
    Route::get('page/contato', 'PageContatoController@index')->name('content.contato.index');
    Route::put('page/contato', 'PageContatoController@update')->name('content.contato.update');

    /*
     * Contato - Redes Sociais
     */
    Route::get('page/contato/{contact}/redes/create', 'PageContatoController@createRede')->name('content.contato.redes.create');
    Route::post('page/contato/{contact}/redes', 'PageContatoController@storeRede')->name('content.contato.redes.store');
    Route::get('page/contato/{contact}/redes/{rede}/edit', 'PageContatoController@editRede')->name('content.contato.redes.edit');
    Route::put('page/contato/{contact}/redes/{rede}', 'PageContatoController@updateRede')->name('content.contato.redes.update');
    Route::get('page/contato/{contact}/redes/{rede}', 'PageContatoController@destroyRede')->name('content.contato.redes.destroy');

    /*
     * Sobre
     */
    Route::get('page/uniformes-sobre', 'PageUniformesSobreController@index')->name('content.uniformes.sobre.index');
    Route::put('page/uniformes-sobre', 'PageUniformesSobreController@update')->name('content.uniformes.sobre.update');
    Route::get('page/camisaria-sobre', 'PageCamisariaSobreController@index')->name('content.camisaria.sobre.index');
    Route::put('page/camisaria-sobre', 'PageCamisariaSobreController@update')->name('content.camisaria.sobre.update');

    /*
     * Produtos
     */
    Route::get('page/uniformes-produtos/load', 'PageUniformesProdutosController@load')->name('content.uniformes.produtos.load');
    Route::post('page/uniformes-produtos/delete/{imageId}', 'PageUniformesProdutosController@delete')->name('content.uniformes.produtos.delete');
    Route::post('page/uniformes-produtos', 'PageUniformesProdutosController@upload')->name('content.uniformes.produtos.upload');
    Route::post('page/uniformes-produtos/reorder', 'PageUniformesProdutosController@reorder')->name('content.uniformes.produtos.reorder');
    Route::get('page/uniformes-produtos', 'PageUniformesProdutosController@index')->name('content.uniformes.produtos.index');
    Route::put('page/uniformes-produtos', 'PageUniformesProdutosController@update')->name('content.uniformes.produtos.update');

    Route::get('page/camisaria-produtos/load', 'PageCamisariaProdutosController@load')->name('content.camisaria.produtos.load');
    Route::post('page/camisaria-produtos/delete/{imageId}', 'PageCamisariaProdutosController@delete')->name('content.camisaria.produtos.delete');
    Route::post('page/camisaria-produtos', 'PageCamisariaProdutosController@upload')->name('content.camisaria.produtos.upload');
    Route::post('page/camisaria-produtos/reorder', 'PageCamisariaProdutosController@reorder')->name('content.camisaria.produtos.reorder');
    Route::get('page/camisaria-produtos', 'PageCamisariaProdutosController@index')->name('content.camisaria.produtos.index');
    Route::put('page/camisaria-produtos', 'PageCamisariaProdutosController@update')->name('content.camisaria.produtos.update');

    /*
     * Serviço
     */
    Route::get('page/uniformes-servicos', 'PageUniformesServicosController@index')->name('content.uniformes.servicos.index');
    Route::post('page/uniformes-servicos', 'PageUniformesServicosController@store')->name('content.uniformes.servicos.store');
    Route::put('page/uniformes-servicos/{service}', 'PageUniformesServicosController@update')->name('content.uniformes.servicos.update');

    /*
     * Serviço - Items
     */
    Route::get('page/uniformes-servicos/{service}/items/create', 'PageUniformesServicosController@createItem')->name('content.uniformes.servicos.items.create');
    Route::post('page/uniformes-servicos/{service}/items', 'PageUniformesServicosController@storeItem')->name('content.uniformes.servicos.items.store');
    Route::get('page/uniformes-servicos/{service}/items/{item}/edit', 'PageUniformesServicosController@editItem')->name('content.uniformes.servicos.items.edit');
    Route::put('page/uniformes-servicos/{service}/items/{item}', 'PageUniformesServicosController@updateItem')->name('content.uniformes.servicos.items.update');
    Route::get('page/uniformes-servicos/{service}/items/{item}', 'PageUniformesServicosController@destroyItem')->name('content.uniformes.servicos.items.destroy');

    /*
     * Clientes
     */
    Route::get('page/uniformes-clientes/load', 'PageUniformesClientesController@load')->name('content.uniformes.clientes.load');
    Route::post('page/uniformes-clientes/delete/{imageId}', 'PageUniformesClientesController@delete')->name('content.uniformes.clientes.delete');
    Route::post('page/uniformes-clientes', 'PageUniformesClientesController@upload')->name('content.uniformes.clientes.upload');
    Route::post('page/uniformes-clientes/reorder', 'PageUniformesClientesController@reorder')->name('content.uniformes.clientes.reorder');
    Route::get('page/uniformes-clientes', 'PageUniformesClientesController@index')->name('content.uniformes.clientes.index');
    Route::put('page/uniformes-clientes', 'PageUniformesClientesController@update')->name('content.uniformes.clientes.update');
    Route::get('page/uniformes-clientes/{imageId}', 'PageUniformesClientesController@destroy')->name('content.uniformes.clientes.destroy');
});

/*
 * FRONT-END
 */
Route::group(['namespace' => 'Front'], function() {
    Route::get('/', 'FrontController@home')->name('home');
    Route::get('/uniformes', 'FrontController@uniformes')->name('uniformes');
    Route::get('/camisaria', 'FrontController@camisaria')->name('camisaria');
    Route::get('/contato', 'FrontController@contato')->name('contato');
});