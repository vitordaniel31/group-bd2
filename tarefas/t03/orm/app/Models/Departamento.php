<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    protected $fillable = [
        'sigla',
        'descricao',
        'gerente',
    ];

    public function gerente()
    {
        return $this->belongsTo(Funcionario::class, 'gerente');
    }
}
