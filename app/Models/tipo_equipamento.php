<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_equipamento extends Model
{
    protected $table = 'tipos_equipamentos';

    protected $fillable = ['name'];
}
