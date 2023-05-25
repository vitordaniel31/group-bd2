<?php

use Carbon\Carbon;
use App\Models\Log;

function medirTempoConsulta($consulta)
{
    $inicio = Carbon::now();
    $resultado = $consulta(); //consulta
    $fim = Carbon::now();

    // Calcula a diferença de tempo
    $diferenca = $fim->diffInMilliseconds($inicio);

    // Obtém o SQL executado
    $sql = $resultado->toSql();

    $log = Log::create([
        'consulta' => $sql,
        'tempo' => $diferenca . ' ms',
    ]);

    return [
        'resultado' => $resultado,
        'sql' => $sql,
        'tempo' => $diferenca . ' ms',
    ];
}