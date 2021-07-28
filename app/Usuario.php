<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'st_usuarios';
    protected $fillable = ['usuario_id', 'usuario_nome', 'usuario_sobrenome', 'usuario_cnpj', 'usuario_razao_social'];
}
