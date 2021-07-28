<?php

namespace App;

class MyApp
{
    /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    |
    | Este array de opções armazena as definições de SEO do site
    |
    */
    const SEO = [
        "base" => "https://tef.ferafoxagencia.com.br/",
        "image" => "https://tef.ferafoxagencia.com.br/public/site/images/og-image.png",
        "author" => "Imperial Tecnologia Web",
        "copyright" => "Imperial Tecnologia Web",
        "description" => "Relatório TEF",
        "theme_color" => "#4a4c4f",
        "title" => "Relatório TEF",
        "site_name" => "Relatório TEF",
    ];

    public static function getTransacaoStatus($codStatus)
    {
        $status = [
            "000" => "Aprovado",
            "05" => "Transação negada pelo emissor",
            "005" => "Transação negada pelo emissor",
            "055" => "Senha incorreta",
            "86" => "Transação desfeita",
            "051" => "Saldo insuficiente",
        ];

        return (array_key_exists($codStatus, $status) ? $status[$codStatus] : "Não Identificado");
    }

}
