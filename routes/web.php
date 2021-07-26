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

Route::get('/', function () {
    if (session()->has('login')):
        return \Illuminate\Support\Facades\Redirect::route('admin.dashboard');
    endif;

    return view('admin.login');
})->name('admin.login');

Route::post('/painel/login/do', 'LoginController@doLogin')->name('login.do');

Route::middleware([
    'AppAuth'
])->group(function () {
    Route::get('/painel/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/painel/logout/do', 'LoginController@doLogout')->name('logout.do');

    Route::get('/painel/pre-conciliacao', function (){
        return view('admin.pages.pre_conciliacao.show');
    })->name('pre-conciliacao');

    Route::get('/painel/venda-avulsa/cadastrar', 'VendaAvulsaController@create')->name('venda-avulsa.cadastrar');
    Route::get('/painel/venda-avulsa/pesquisar', 'VendaAvulsaController@index')->name('venda-avulsa.pesquisar');
    Route::get('/painel/venda-avulsa/importar', 'VendaAvulsaController@getImportar')->name('venda-avulsa.importar');
    Route::post('/painel/venda-avulsa/cadastrar/do', 'VendaAvulsaController@store')->name('venda-avulsa.cadastrar.do');
    Route::post('/painel/venda-avulsa/pesquisar/do', 'VendaAvulsaController@doPesquisar')->name('venda-avulsa.pesquisar.do');
    Route::post('/painel/venda-avulsa/importar/do', 'VendaAvulsaController@doImportar')->name('venda-avulsa.importar.do');

    Route::get('/painel/venda-detalhada', 'VendaDetalhadaController@index')->name('venda-detalhada.pesquisar');
    Route::post('/painel/venda-detalhada/pesquisar/do', 'VendaDetalhadaController@makeReport')->name('venda-detalhada.pesquisar.do');

    Route::get('/painel/venda-resumo', 'VendaResumoController@index')->name('venda-resumo.pesquisar');
    Route::post('/painel/venda-resumo/pesquisar/do', 'VendaResumoController@makeReport')->name('venda-resumo.pesquisar.do');

    Route::get('/painel/venda-pendente', 'VendaPendenteController@index')->name('venda-pendente.pesquisar');
    Route::post('/painel/venda-pendente/pesquisar/do', 'VendaPendenteController@makeReport')->name('venda-pendente.pesquisar.do');
});
