<?php

use App\Definicao\Geral;
use App\Http\Controllers\Admin\AdminRouterController;
use App\Http\Controllers\Crud\CategoriaController;
use App\Http\Controllers\Crud\JornalController;
use App\Http\Controllers\Crud\PermissaoController;
use App\Http\Controllers\Crud\RegraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use Facade\FlareClient\Http\Response;
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


require __DIR__ . '/auth.php';


Route::prefix('/')->group(function () {
    Route::controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('contactos', 'contact')->name('conversa');
        Route::get('sobre-nos', 'sobre')->name('sobre');
        Route::post('contacto', 'contacto')->name('contacto');
        Route::get('pesquisar', 'search')->name('search');
        Route::post('newsletter', 'Newsletter')->name('newsletter');

        Route::prefix('jornal')->name('jornal.')->middleware('auth')->group(function () {
            Route::get('/', 'jornal_index')->name('index');
            Route::get('detalhe/{link}', 'jornal_detalhe')->name('detalhe')->middleware('pagamento');
            Route::get('pagar', 'jornal_pagar')->name('pagamento');
            Route::post('comprar', 'comprarJornal')->name('comprar');
        });

        Route::prefix('categoria')->group(function () {
            Route::get('{link}', 'categoria_index')->name('categoria');
            Route::get('/', 'categorias_todas')->name('categoria.index');
        });




        Route::prefix('chat')->name('chat.')->middleware('auth')->group(function () {
            Route::get('/', 'acom_index')->name('index');
            Route::post('detalhe', 'acom_iniciar_conversa')->name('iniciar');
            Route::get('pagar', 'acom_consersa')->name('conversa');
        });
    });
    Route::middleware('auth')->group(function () {
        Route::prefix('perfil')->name('perfil.')->group(function () {
            Route::controller(PerfilController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('conta', 'index')->name('conta');
                Route::get('voucher', 'voucher')->name('voucher');
                Route::get('voucher-novo', 'voucher_create')->name('voucher.create');
                Route::post('voucher-salvar', 'voucher_store')->name('voucher.store');
                Route::post('voucher-carregar', 'voucher_carregar')->name('voucher.carregar');
                Route::get('editar', 'edit')->name('editar');
                Route::post('atualizar', 'update')->name('update');
            });
        });
    });
});

Route::prefix('painel')->name('admin.')->middleware('auth', 'staff:admin,editor,escritor')->group(function () {
    Route::prefix('/')->group(function () {
        Route::controller(AdminRouterController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('permissao', 'permissao')->name('pregra');
            Route::get('usuarios', 'usuarios')->name('usuarios');
            Route::get('usuario/{id}', 'usuario')->name('usuario');
            Route::post('add-regra', 'regra')->name('usuario.add');
            Route::get('nova-permissao', 'regra_nova')->name('nova.permissao');
            Route::get('lista-permissao', 'regra_index')->name('nova.lista');
            Route::post('nova', 'store')->name('permissao.regra.store');
        });
    });

    Route::prefix('jornal')->name('jornal.')->group(function () {
        Route::controller(JornalController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('novo', 'create')->name('create')->middleware('staff:admin,escritor');
            Route::post('guardar', 'store')->name('store')->middleware('staff:admin,escritor');
            Route::get('detalhe/{url}', 'show')->name('show');
            Route::get('editar/{url}', 'edit')->name('edit')->middleware('staff:admin,editor');
            Route::post('atualizar/{url}', 'update')->name('update')->middleware('staff:admin,editor');
            Route::delete('eliminar/{url}', 'destroy')->name('delete')->middleware('staff:admin');
        });
    });

    Route::prefix('categoria')->name('categoria.')->group(function () {
        Route::controller(CategoriaController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('novo', 'create')->name('create');
            Route::post('guardar', 'store')->name('store');
            Route::get('detalhe/{url}', 'show')->name('show');
            Route::get('editar/{url}', 'edit')->name('edit');
            Route::post('atualizar/{url}', 'update')->name('update');
            Route::delete('eliminar/{url}', 'destroy')->name('delete');
        });
    });

    Route::prefix('regras')->name('regra.')->group(function () {
        Route::controller(RegraController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('novo', 'create')->name('create');
            Route::post('guardar', 'store')->name('store');
            Route::get('detalhe/{url}', 'show')->name('show');
            Route::get('editar/{url}', 'edit')->name('edit');
            Route::post('atualizar/{url}', 'update')->name('update');
            Route::delete('eliminar/{url}', 'destroy')->name('delete');
        });
    });

    Route::prefix('permissao')->name('permissao.')->group(function () {
        Route::controller(PermissaoController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('novo', 'create')->name('create');
            Route::post('guardar', 'store')->name('store');
            Route::get('detalhe/{url}', 'show')->name('show');
            Route::get('editar/{url}', 'edit')->name('edit');
            Route::post('atualizar/{url}', 'update')->name('update');
            Route::delete('eliminar/{url}', 'destroy')->name('delete');
        });
    });
});



Route::get('test', function () {
$api = "http://localhost:8000/storage/jornal/imagem/9kGWNHr7fKnmpuexbuaLyw4rRLKf2GZzC0J4ETgU.jpg";
    return "<img src='{{ $api }}' />";
});
