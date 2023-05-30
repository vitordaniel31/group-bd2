<?php
include('app/config/connection.php');

use App\Models\Projeto;

$projeto = Projeto::find(2); //passe o código do projeto como parâmetro

if ($projeto && $projeto->atividades()->count() > 0) {
    foreach ($projeto->atividades as $atividade) {
        echo "{$atividade->descricao}\n";
    }
} else {
    echo "O projeto não existe ou não tem atividades.";
}
