<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaDetalhada extends Model
{
    private $headers;
    /**
     * @var array armazena os filtros que são aplicados na response da requisição
     */
    private $defaultFiltros = ['TransacaoTerminal', 'RedeNome', 'BandeiraNome', 'GrupoServicoDescricao', 'ServicoDescricao'];
    private $filtros;
    private $response;
    private $responseCode;
    private $endPoint = 'http://web1.datapaytecnologia.com/tefmc/api/Servicos/GetTransacoes';


    /*
     * ++++++++++++++++++++++++++++++++++++++++++++++++++++
     * ++++++++++++++++ PUBLIC METHODS ++++++++++++++++++++
     * ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    public function callApi($filtros)
    {
        $this->filtros = $filtros;
        $this->setHttpHeaders();
        $this->exec();
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function makeDataTable($data)
    {
        $return = array();
        $return['dataTableInit'] = [
            'key' => '#rp-table',
            'pageLength' => 25,
            'orderColumn' => 0,
            'orderDir' => 'desc',
            'print' => true,
            'printCols' => [1, 2, 3, 4, 5, 6, 7, 8, 9],
            'printHeader' => "
                    <p class='text-center'><button type='button' class='btn btn-success mt-3' id='print-open'>Imprimir/Salvar<i class='fas fa-print ml-2'></i></button></p>
                    <h3>Relatório de Vendas</h3>
                    <header class='header-print'>
                        <p>
                            <b>Empresa:</b> " . session()->get('login')->usuario_razao_social . "<br>
                            <b>Intervalo de Data:</b> " . date("d-m-Y", strtotime($this->filtros['data_inicio'])) . " até " . (!is_null($this->filtros['data_fim']) ? date("d-m-Y", strtotime($this->filtros['data_fim'])) : date('d-m-Y')) . "<br>
                            <b>Terminal:</b> " . ($this->filtros['TransacaoTerminal'] == '-1' ? 'Todos' : $this->filtros['TransacaoTerminal']) . "<br>
                            <b>Operadora:</b> " . ($this->filtros['RedeNome'] == '-1' ? 'Todas' : $this->filtros['RedeNome']) . "<br>
                            <b>Bandeira:</b> " . ($this->filtros['BandeiraNome'] == '-1' ? 'Todas' : $this->filtros['BandeiraNome']) . "<br>
                            <b>Status de transação:</b> " . implode(' - ', $this->filtros['status']) . "<br>
                            <b>Gerado em:</b> " . date('d/m/Y H:i:s') . "
                        </p>
                    </header>
            "
        ];

        $modal = "";
        $table = "<div class='table-responsive'>
                <table id='rp-table' class='table table-striped table-bordered'>
                    <thead class='thead-dark'>
                    <tr>
                        <th>-</th>
                        <th style='min-width: 115px!important;'>Data</th>
                        <th>Autorização</th>
                        <th>Bandeira</th>
                        <th>Operadora</th>
                        <th style='min-width: 100px!important;'>Serviço</th>
                        <th style='min-width: 70px!important;'>Situação</th>
                        <th>Parcelas</th>
                        <th>NSU</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>";
        $total = 0;
        foreach ($data as $key => $dt):
//            ApiBandeira::firstOrCreate(['nome' => $dt['BandeiraNome']]);
//            ApiOperadora::firstOrCreate(['codigo' => $dt['RedeCodigo'], 'nome' => $dt['RedeNome']]);

            if ($this->isFiltroValidado($dt)):
                $unixTimestamp = (!is_null($dt['TransacaoDataHoraAdministradora']) ? substr($dt['TransacaoDataHoraAdministradora'], 6, 10) : substr($dt['TransacaoDataHoraEstabelecimento'], 6, 10));
                $dateTime = new \DateTime("@$unixTimestamp");
                $table .= "<tr class='font-13'>
                        <td><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modalRp{$key}'><i class='fas fa-search-plus'></i></button></td>
                        <td>{$dateTime->format('d/m/Y H:i:s')}</td>
                        <td>{$dt['TransacaoCodigoAutorizacao']}</td>
                        <td>" . ucwords(mb_strtolower($dt['BandeiraNome'])) . "</td>
                        <td>" . ucwords(mb_strtolower($dt['RedeNome'])) . "</td>
                        <td>" . ucwords(mb_strtolower($dt['ServicoDescricao'])) . "</td>
                        <td>" . MyApp::getTransacaoStatus($dt['TransacaoCodResposta']) . "</td>
                        <td>{$dt['TransacaoQtdParcelas']}</td>
                        <td>{$dt['TransacaoNSU']}</td>
                        <td>R$" . number_format($dt['TransacaoValor'], 2, ',', '.') . "</td>
                    </tr>
                    ";
                $modal .= "<div class='modal fade' id='modalRp{$key}' aria-hidden='true'>
                      <div class='modal-dialog modal-xl modal-dialog-centered'>
                        <div class='modal-content'>
                          <div class='modal-header bg-dark text-white'>
                            <h5 class='modal-title'>Detalhes da transação - Autorização {$dt['TransacaoCodigoAutorizacao']}</h5>
                          </div>
                          <div class='modal-body'>
                            <div class='row'>
                            <div class='col-6'>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'><b>Operadora:</b> {$dt['RedeNome']}</li>
                                    <li class='list-group-item'><b>Bandeira:</b> {$dt['BandeiraNome']}</li>
                                    <li class='list-group-item'><b>Grupo de Seviço:</b> " . ucfirst($dt['GrupoServicoDescricao']) . "</li>
                                    <li class='list-group-item'><b>Seviço:</b> {$dt['ServicoDescricao']}</li>
                                    <li class='list-group-item'><b>Origem:</b> {$dt['Origem']}</li>
                                    <li class='list-group-item'><b>PDV:</b> {$dt['TransacaoTerminal']}</li>
                                </ul>
                            </div>
                            <div class='col-6'>
                            <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'><b>Data Mensagem:</b> " . date('d/m/Y') . "</li>
                                    <li class='list-group-item'><b>Data Estabelecimento:</b> " . date('d/m/Y H:i:s') . "</li>
                                    <li class='list-group-item'><b>Data Administradora:</b> " . date('d/m/Y H:i:s') . "</li>
                                    <li class='list-group-item'><b>NSU_Sit:</b> {$dt['TransacaoNSU']}</li>
                                    <li class='list-group-item'><b>NSU Host:</b> " . (is_null($dt['TransacaoNsuHost']) || empty($dt['TransacaoNsuHost']) ? "Não Disponível" : $dt['TransacaoNsuHost']) . "</li>
                                </ul>
</div>
                            </div>
                          </div>
                            <div class='modal-footer text-right'>
                                <button type='button' class='btn btn-danger' data-dismiss='modal' aria-label='Close'>
                                  Fechar<i class='fas fa-times ml-2'></i>
                                </button>
                            </div>
                        </div>
                      </div>
                    </div>";

                $total += $dt['TransacaoValor'];
            endif;
        endforeach;
        $table .= "</tbody></table></div>";

        $return['dataTableInit']['printFooter'] = "<h5 class='text-right mt-4 mb-4 pr-5 mr-1 font-weight-bold'>TOTAL <span class='ml-3'>R$" . number_format($total, 2, ',', '.') . "</span></h5>";
        $return['contentHtml']['#modal-content'] = $modal;
        $return['contentHtml']['#report-data'] = $table;

        return $return;
    }

    /*
     * ++++++++++++++++++++++++++++++++++++++++++++++++++++
     * +++++++++++++++ PRIVATE METHODS ++++++++++++++++++++
     * ++++++++++++++++++++++++++++++++++++++++++++++++++++
     */
    private function setHttpHeaders()
    {
        $this->headers = [
            'token: 40039b751238d0a78d0cdd490b147589',
            'tipodatapesquisa: ADM',
            'RetornaJSON: SIM',
            'cnpj: ' . str_replace(['.', '-', '/'], "", session()->get('login')->usuario_cnpj),
            'terminal: ' . ($this->filtros['TransacaoTerminal'] != "-1" ? $this->filtros['TransacaoTerminal'] : 0),
            'numeroPagina: 1',
            'DataInicio: ' . date("d-m-Y", strtotime($this->filtros['data_inicio'])),
            'DataFinal: ' . (!is_null($this->filtros['data_fim']) ? date("d-m-Y", strtotime($this->filtros['data_fim'])) : date('d-m-Y')),
            'status: ' . implode('|', $this->filtros['status'])
        ];

        /* ###################################
         * ############ OPCIONAIS ############
         * ###################################*/
        if (!is_null($this->filtros['TransacaoCodigoAutorizacao'])):
            $this->headers[] = 'autorizacao: ' . $this->filtros['TransacaoCodigoAutorizacao'];
        endif;
        if (!is_null($this->filtros['TransacaoNSU'])):
            $this->headers[] = 'nsu: ' . $this->filtros['TransacaoNSU'];
        endif;
        if (!is_null($this->filtros['HoraInicio'])):
            $this->headers[] = 'HoraInicio: ' . $this->filtros['HoraInicio'];
        endif;
        if (!is_null($this->filtros['HoraFim'])):
            $this->headers[] = 'HoraFim: ' . $this->filtros['HoraFim'];
        endif;
    }

    private function exec()
    {
        $cURL = curl_init($this->endPoint);
        curl_setopt_array($cURL, $this->setOpts());
        $this->response = json_decode(curl_exec($cURL), true);
        $this->responseCode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);
        curl_close($cURL);

    }

    private function setOpts()
    {
        $Opts = array(
            CURLOPT_HTTPHEADER => $this->headers,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_RETURNTRANSFER => TRUE
        );

        return $Opts;
    }

    private function isFiltroValidado($data)
    {
        $controle = TRUE;
        // pegar os filtros
        foreach ($this->getFiltros() as $key => $valor):
//                dd($data[$key], $valor);
            if ($data[$key] != $valor):
                $controle = FALSE;
                return false;
            endif;
        endforeach;

        return $controle;
    }

    private function getFiltros()
    {
        $response = array();
        foreach ($this->filtros as $key => $valor):
            if ($valor != "-1" && in_array($key, $this->defaultFiltros)):
                $response[$key] = $valor;
            endif;
        endforeach;

        return $response;
    }

}
