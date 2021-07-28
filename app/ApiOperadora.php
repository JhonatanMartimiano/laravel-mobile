<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiOperadora extends Model
{
    protected $table = 'rp_api_operadoras';
    protected $fillable = ['codigo', 'nome'];
}
