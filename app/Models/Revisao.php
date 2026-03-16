<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revisao extends Model
{
    use SoftDeletes;

    protected $table = 'revisoes';

    protected $fillable = [
        'veiculo_id',
        'data',
        'km',
        'proxima_km',
        'local',
        'valor'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}