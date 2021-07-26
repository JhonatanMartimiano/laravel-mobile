<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiBandeira extends Model
{
    protected $table = 'rp_api_bandeiras';
    protected $fillable = ['nome'];
}
