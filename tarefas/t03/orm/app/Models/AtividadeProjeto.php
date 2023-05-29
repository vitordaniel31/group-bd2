<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtividadeProjeto extends Model
{
    protected $table = 'atividade_projeto';
    public $timestamps = false;
    protected $primaryKey = null;

    public function atividade()
    {
        return $this->belongsTo(Atividade::class, 'codAtividade');
    }

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'codProjeto');
    }
}