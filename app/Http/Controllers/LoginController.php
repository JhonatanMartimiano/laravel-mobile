<?php

namespace App\Http\Controllers;

use App\Dashboard;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function doLogin(Request $request)
    {
        $return = array();
        $data = ['pass' => md5($request->get('password')), 'email' => $request->get('email')];
        $user = Usuario::where('usuario_senha', $data['pass'])->where('usuario_email', $data['email'])->get();

        if ($user->isEmpty()):
            $return['contentHtml']['#response'] = '<div class="alert alert-warning"><b>Atenção:</b><br>E-mail ou senha incorreto, verifique!</div>';
            return $return;
        elseif ($user->first()['liberado_novo_sistema'] == 0):
            $return['contentHtml']['#response'] = '<div class="alert alert-warning"><b>Atenção:</b><br>Você não tem permissão para acessar o sistema, contate o administrador do sistema!</div>';
            return $return;
        elseif (is_null($user->first()['usuario_cnpj']) || empty($user->first()['usuario_cnpj'])):
            $return['contentHtml']['#response'] = '<div class="alert alert-warning"><b>Atenção:</b><br>CNPJ não localizado na conta do usuário, contate o administrador do sistema!</div>';
            return $return;
        endif;

        // Login
        $test = new Dashboard();
        if ($test->testeLogin($user->first()['usuario_cnpj']) === FALSE):
            $return['contentHtml']['#response'] = '<div class="alert alert-warning"><b>Atenção:</b><br>CNPJ não disponivel na API, contate o administrador do sistema!</div>';
            return $return;
        endif;

        $request->session()->put('login', $user->first());
        $return['redirect'] = route('admin.dashboard');

        return $return;
    }

    public function doLogout()
    {
        \session()->flush();
        return Redirect::route('admin.login');
    }
}
