<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sexo',
        'dataNasc',
        'salario',
        'supervisor',
        'depto',
    ];

    protected $casts = [
        'dataNasc' => 'date',
    ];

    public function supervisor()
    {
        return $this->belongsTo(Funcionario::class, 'supervisor');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'depto');
    }
}