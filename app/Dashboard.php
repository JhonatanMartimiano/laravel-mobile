<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public function getStats()
    {
        $stats = [
            'vendas_hoje' => 0,
            'vendas_semana' => 0,
            'vendas_mes' => 0,
            'vendas_ano' => 0,
        ];

//        $response = self::makeRequest(date("d-m-Y", strtotime('01-01-' . date('Y'))), date('d-m-Y'));

        $response = $this->makeRequest(date("d-m-Y"), date('d-m-Y'));
        foreach ($response['registros'] as $key => $item):
            $unixTimestamp = (!is_null($item['TransacaoDataHoraAdministradora']) ? substr($item['TransacaoDataHoraAdministradora'], 6, 10) : false);
            $dateTime = ($unixTimestamp ? new \DateTime("@$unixTimestamp") : "Não Informado");

            $stats['vendas_hoje'] += $item['TransacaoValor'];
        endforeach;

        $response = $this->makeRequest(date("d-m-Y", strtotime('- 1week')), date('d-m-Y'));
        foreach ($response['registros'] as $key => $item):
            $unixTimestamp = (!is_null($item['TransacaoDataHoraAdministradora']) ? substr($item['TransacaoDataHoraAdministradora'], 6, 10) : false);
            $dateTime = ($unixTimestamp ? new \DateTime("@$unixTimestamp") : "Não Informado");

            $stats['vendas_semana'] += $item['TransacaoValor'];
        endforeach;

        $response = $this->makeRequest(date("d-m-Y", strtotime('- 30days')), date('d-m-Y'));
        foreach ($response['registros'] as $key => $item):
            $unixTimestamp = (!is_null($item['TransacaoDataHoraAdministradora']) ? substr($item['TransacaoDataHoraAdministradora'], 6, 10) : false);
            $dateTime = ($unixTimestamp ? new \DateTime("@$unixTimestamp") : "Não Informado");
            $stats['vendas_mes'] += $item['TransacaoValor'];
        endforeach;

        $response = $this->makeRequest(date("d-m-Y", strtotime('- 1year')), date('d-m-Y'));
        foreach ($response['registros'] as $key => $item):
            $unixTimestamp = (!is_null($item['TransacaoDataHoraAdministradora']) ? substr($item['TransacaoDataHoraAdministradora'], 6, 10) : false);
            $dateTime = ($unixTimestamp ? new \DateTime("@$unixTimestamp") : "Não Informado");
            $stats['vendas_ano'] += $item['TransacaoValor'];
        endforeach;

        return $stats;
    }

    public function testeLogin($cnpj)
    {
        $test = $this->makeRequest(date("d-m-Y"), date('d-m-Y'), $cnpj);
        if ($test['responseCode'] !== 200):
            return FALSE;
        endif;

        return TRUE;
    }

    private function makeRequest($data_inicial, $data_final, $cnpj = null)
    {
        $Opts = array(
            CURLOPT_HTTPHEADER => [
                'token: 40039b751238d0a78d0cdd490b147589',
                'tipodatapesquisa: ADM',
                'RetornaJSON: SIM',
                'cnpj: ' . str_replace(['.', '-', '/'], "", (!is_null($cnpj) ? $cnpj : session()->get('login')->usuario_cnpj)),
                'terminal: 0',
                'numeroPagina: 1',
                'DataInicio: ' . $data_inicial,
                'DataFinal: ' . $data_final,
                'status: OK'
            ],
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_RETURNTRANSFER => TRUE
        );

        $cURL = curl_init('http://web1.datapaytecnologia.com/tefmc/api/Servicos/GetTransacoes');
        curl_setopt_array($cURL, $Opts);
        $response = json_decode(curl_exec($cURL), true);
        $responseCode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);
        curl_close($cURL);

//        dd($response);
        return ['registros' => (!is_null($response) ? $response['Transacoes'] : null), 'responseCode' => $responseCode];
    }
}
