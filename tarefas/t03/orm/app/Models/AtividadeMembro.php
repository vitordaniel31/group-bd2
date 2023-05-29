<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtividadeMembro extends Model
{
    protected $table = 'atividade_membro';
    public $timestamps = false;
    protected $primaryKey = ['codAtividade', 'codMembro'];

    protected $fillable = [
        'codAtividade',
        'codMembro',
    ];

    public function atividade()
    {
        return $this->belongsTo(Atividade::class, 'codAtividade');
    }

    public function membro()
    {
        return $this->belongsTo(Membro::class, 'codMembro');
    }
}