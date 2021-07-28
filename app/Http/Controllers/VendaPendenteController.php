<?php

namespace App\Http\Controllers;

use App\ApiBandeira;
use App\ApiOperadora;
use App\VendaPendente;
use Illuminate\Http\Request;

class VendaPendenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.venda_pendente.show', ['bandeiras' => ApiBandeira::all(), 'operadoras' => ApiOperadora::all()]);
    }

    public function makeReport(Request $request)
    {
        $filtros = $request->all();
        $return = array();
        $RP = new VendaPendente();
        $RP->callApi($filtros);

        $return['showElement'] = 'report-data';

        if ($RP->getResponseCode() !== 200):
            $return['contentHtml']['#report-data'] = '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle mr-2"></i>Sua busca não retornou nenhuma informação!</div>';
            return json_encode($return);
        endif;

        return json_encode($RP->makeDataTable($RP->getResponse()['Transacoes']));
    }
}
