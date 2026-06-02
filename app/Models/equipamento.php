<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipamento extends Model
{
    protected $fillable = ['name', 'modelo', 'marca', 'tensao', 'tamanhoTela', 'cor', 'material', 'acessorios', 'resolucaoTela', 'processador', 'memoriaRam', 'armazenamento', 'wifi', 'portasEthernet', 'bluetooth', 'portasUSB', 'portasHDMI'];
}
