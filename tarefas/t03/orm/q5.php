<?php

include('app/config/connection.php');
use App\Models\Projeto;

$projetos = Projeto::select('projeto.codigo', 'projeto.descricao', 'funcionario.nome')
    ->selectRaw('(SELECT COUNT(*) FROM funcionario 
        JOIN membro ON membro.codFuncionario = funcionario.codigo
        JOIN equipe ON equipe.codigo = membro.codEquipe
        WHERE equipe.codigo = projeto.equipe) as membroEquipeProj')
    ->selectRaw('(SELECT DATEDIFF(CURDATE(), projeto.dataFim)
        WHERE projeto.situacao = "Em andamento" OR projeto.situacao = "Planejado") as diasProjetoAtrasado')
    ->selectRaw('(SELECT COUNT(*) from atividade_projeto 
        JOIN atividade ON atividade_projeto.codAtividade = atividade.codigo
        WHERE atividade_projeto.codProjeto = projeto.codigo) as atvProjeto')
    ->selectRaw('(SELECT COUNT(*) from atividade
        JOIN atividade_projeto ON atividade.codigo = atividade_projeto.codAtividade
        WHERE atividade_projeto.codProjeto = projeto.codigo
        AND (atividade.situacao = "Planejado" OR atividade.situacao = "Em andamento") 
        AND atividade.dataFim < CURDATE()
        GROUP BY projeto.codigo) as atvAtrasadasProjeto')
    ->selectRaw('(SELECT SUM(DATEDIFF(CURDATE(), atividade.dataFim)) from atividade
        JOIN atividade_projeto ON atividade.codigo = atividade_projeto.codAtividade
        WHERE atividade_projeto.codProjeto = projeto.codigo
        AND (atividade.situacao = "Planejado" OR atividade.situacao = "Em andamento") 
        AND atividade.dataFim < CURDATE()
        LIMIT 1) as diasAtvAtrasadas')
    ->join('funcionario', 'funcionario.codigo', '=', 'projeto.responsavel')
    ->join('departamento', 'departamento.codigo', '=', 'projeto.depto')
    ->get();

foreach ($projetos as $projeto) {
    echo $projeto->codigo . ' - ' . $projeto->descricao . ' - ' . $projeto->nome . "\n";
    echo '- Total de Membros da Equipe do Projeto: ' . $projeto->membroEquipeProj . "\n";
    if ($projeto->diasProjetoAtrasado == null) {
        echo '- Total de Dias de Atraso do Projeto: ' . 0 . "\n";
    }else{
        echo '- Total de Dias de Atraso do Projeto: ' . $projeto->diasProjetoAtrasado . "\n";
    }
    echo '- Total de Atividades do Projeto: ' . $projeto->atvProjeto . "\n";
    if ($projeto->atvAtrasadasProjeto == null) {
        echo '- Total de Atividades Atrasadas do Projeto: ' . 0 . "\n";
    }else{
        echo '- Total de Atividades Atrasadas do Projeto: ' . $projeto->atvAtrasadasProjeto . "\n";;
    }
    if ($projeto->diasAtvAtrasadas == null) {
        echo '- Total de Dias de Atividades Atrasadas: ' . 0 . "\n";
    }else{
        echo '- Total de Dias de Atividades Atrasadas: ' . $projeto->diasAtvAtrasadas . "\n";
    }
    echo "<br>";
}

?>
