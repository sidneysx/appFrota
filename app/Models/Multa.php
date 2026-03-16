<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'setor',
        'veiculo',
        'responsavel',
        'descricao',
        'numero_auto',
        'data_recebimento',
        'data_vencimento',
        'situacao',
        'pdf',
        'pdf_desconto',
    ];
}
