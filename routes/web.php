<?php

use App\Http\Controllers\ERP\Painel\{
    CategoriaController,
    ContatoController,
    HomeController,
    LocalizacaoController,
    ProdutoController,
    ProdutoLocalizacaoController,
    ResourceController,
    RoleController,
    TipoMovimentoController,
    UnidadeController
};

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified', 'access.control.list')->group(function () {

    #Route Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    #Route Home

    //Cadastros
    #Route Categoria
    Route::resource('categoria', CategoriaController::class);
    #Route Categoria

    #Route Unidade
    Route::resource('unidade', UnidadeController::class);
    #Route Unidade

    #Route Produto
    Route::resource('produto', ProdutoController::class);
    #Route Produto

    #Route Contato
    Route::resource('contato', ContatoController::class);
    #Route Contato

    //Estoque
    #Route Tipo Movimento
    Route::resource('tipomovimento', TipoMovimentoController::class);
    #Route Tipo Movimento

    #Route Localização
    Route::resource('localizacao', LocalizacaoController::class);
    #Route Localização

    #Route Produto Localizacao
    Route::resource('produtolocalizacao', ProdutoLocalizacaoController::class);
    #Route Produto Localizacao

    //Configurações
    #Route Role
    Route::resource('role', RoleController::class);
    #Route Role

    #Route Resource
    Route::resource('resource', ResourceController::class);
    #Route Resource
});

require __DIR__ . '/acl.php';

Auth::routes(['register' => false, 'verify' => true]);
