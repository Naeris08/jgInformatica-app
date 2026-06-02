<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
    'title', 'modelo', 'marca', 'tensao', 'tamanhoTela', 'cor', 'material', 
    'acessorios', 'resolucaoTela', 'processador', 'memoriaRam', 'armazenamento', 
    'wifi', 'portasEthernet', 'bluetooth', 'portasUSB', 'portasHDMI', 
    'tipos_equipamentos_id', 'image', 'quantidade','preco'
];

    public function tipoEquipamento()
    {
        return $this->belongsTo(Tipo_equipamento::class, 'tipos_equipamentos_id');
    }
}