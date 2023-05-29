<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $table = 'membro';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    protected $fillable = [
        'codEquipe',
        'codFuncionario',
    ];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'codEquipe');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'codFuncionario');
    }
}