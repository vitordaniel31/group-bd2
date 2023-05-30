<?php

use Carbon\Carbon;
use App\Models\Log;

function medirTempoConsulta($sql, $consulta)
{
    $inicio = Carbon::now();
    $resultado = $consulta(); //consulta
    $fim = Carbon::now();

    // Calcula a diferença de tempo
    $diferenca = $fim->diffInMilliseconds($inicio);

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