<?php

namespace App\Http\Controllers;

use App\ApiBandeira;
use App\ApiOperadora;
use App\VendaDetalhada;
use Illuminate\Http\Request;

class VendaDetalhadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.venda_detalhada.show', ['bandeiras' => ApiBandeira::all(), 'operadoras' => ApiOperadora::all()]);
    }

    public function makeReport(Request $request)
    {
        $filtros = $request->all();
        $return = array();
        $RP = new VendaDetalhada();
        $RP->callApi($filtros);

        $return['showElement'] = 'report-data';

        if ($RP->getResponseCode() !== 200):
            $return['contentHtml']['#report-data'] = '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle mr-2"></i>Sua busca não retornou nenhuma informação, redefina as configurações da pesquisa!</div>';
            return json_encode($return);
        endif;


//        dd($RP->getResponse()['Transacoes']);

        return json_encode($RP->makeDataTable($RP->getResponse()['Transacoes']));
    }
}
