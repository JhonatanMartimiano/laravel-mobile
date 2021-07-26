<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://web1.datapaytecnologia.com/*',
        'http://web1.datapaytecnologia.com/tefmc/*',
        'http://web1.datapaytecnologia.com/tefmc/api/Servicos/*',
        'app',
        'https://tef.ferafoxagencia.com.br/painel/login/do',
        'migaiframe',
        'frame',
        'iframe',
        'bundle',
        'http',
        'ferafoxagencia',
        'datapaytecnologia',
        'index-prod.html',
        'index-prod',
        'index',
        'queroapp',
        'app.datapaytecnologia.com',
        'datapaytecnologia/*',
        'app.datapaytecnologia.com/var/apps/browser/*',
        'http://app.datapaytecnologia.com/var/apps/browser/*',
        'http://app.datapaytecnologia.com/var/apps/browser/index-prod.html',
        'https://builder.queroapp.com.br/60f6bd8e70690/*',
        'https://builder.queroapp.com.br/*',
        'http://builder.queroapp.com.br/*',
        'http://example.com/foo/*',
        'https://tef.ferafoxagencia.com.br/painel/login/do',
        'https://tef.ferafoxagencia.com.br/admin/*',
        'http://tef.ferafoxagencia.com.br/painel/login/do',
        'https://tef.ferafoxagencia.com.br/*',
        'https://tef.ferafoxagencia.com.br/*',
        'tef.ferafoxagencia.com.br/*',
        'ferafoxagencia.com.br/*',
        'https://tef.ferafoxagencia.com.br/painel/dashboard',
        'https://tef.ferafoxagencia.com.br/painel/*',
        'http://tef.ferafoxagencia.com.br/painel/dashboard',
        'http://tef.ferafoxagencia.com.br/painel/*',
        'http://app.datapaytecnologia.com/var/apps/browser/*',
        'https://builder.queroapp.com.br/var/apps/browser/*'
        
    ];
}
