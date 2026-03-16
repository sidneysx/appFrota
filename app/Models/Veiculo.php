<?php

namespace App\Models;

use App\Models\Revisao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'renavan_numero',
        'renavan_pdf',
        'veiculo',
        'ano',
        'tipo',
        'setor',
        'responsavel',
        'dpl',
        'revisao',
    ];

    public function revisoes()
    {
        return $this->hasMany(Revisao::class);
    }
}