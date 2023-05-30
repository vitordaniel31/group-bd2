<?php

require 'vendor/autoload.php';

$capsule = require 'app/config/connection.php';

$capsule::connection()->getPdo()->exec('
    CREATE OR REPLACE PROCEDURE relatorioAnalitico()
    BEGIN
        SELECT p.codigo, p.descricao, f.nome, 
        (SELECT COUNT(*) FROM funcionario 
            JOIN membro ON membro.codFuncionario = funcionario.codigo
            JOIN equipe ON equipe.codigo = membro.codEquipe
            WHERE equipe.codigo = p.equipe) as membroEquipeProj,
        (SELECT DATEDIFF(CURDATE(), p.dataFim)
            WHERE p.situacao = "Em andamento" OR p.situacao = "Planejado") as diasProjetoAtrasado,
        (SELECT COUNT(*) FROM atividade_projeto
            JOIN atividade ON atividade_projeto.codAtividade = atividade.codigo
            WHERE atividade_projeto.codProjeto = p.codigo) as atvProjeto,
        (SELECT COUNT(*) FROM atividade
            JOIN atividade_projeto ON atividade.codigo = atividade_projeto.codAtividade
            WHERE atividade_projeto.codProjeto = p.codigo
            AND (atividade.situacao = "Planejado" OR atividade.situacao = "Em andamento")
            AND atividade.dataFim < CURDATE()
            GROUP BY p.codigo) as atvAtrasadasProjeto,
        (SELECT SUM(DATEDIFF(CURDATE(), atividade.dataFim)) FROM atividade
            JOIN atividade_projeto ON atividade.codigo = atividade_projeto.codAtividade
            WHERE atividade_projeto.codProjeto = p.codigo
            AND (atividade.situacao = "Planejado" OR atividade.situacao = "Em andamento")
            AND atividade.dataFim < CURDATE()
            LIMIT 1) as diasAtvAtrasadas
        FROM projeto p
        JOIN funcionario f ON f.codigo = p.responsavel
        JOIN departamento d ON d.codigo = p.depto;
    END');

$results = $capsule::connection()->select('CALL relatorioAnalitico()');

foreach ($results as $result) {
    echo $result->codigo . ' - ' . $result->descricao . ' - ' . $result->nome . "\n";
    echo '- Total de Membros da Equipe do Projeto: ' . $result->membroEquipeProj . "\n";
    echo '- Total de Dias de Atraso do Projeto: ' . ($result->diasProjetoAtrasado ?? 0) . "\n";
    echo '- Total de Atividades do Projeto: ' . $result->atvProjeto . "\n";
    echo '- Total de Atividades Atrasadas do Projeto: ' . ($result->atvAtrasadasProjeto ?? 0) . "\n";
    echo '- Total de Dias de Atividades Atrasadas: ' . ($result->diasAtvAtrasadas ?? 0) . "\n";
    echo "<br>";
}
