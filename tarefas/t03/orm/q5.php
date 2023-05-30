<?php

function questao5()
{
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

    $sql = "CALL relatorioAnalitico()";
    $consulta = medirTempoConsulta($sql, function () use ($capsule, $sql) {
        return $capsule::connection()->select($sql); 
    });

    $resultados = $consulta['resultado'];

    /*foreach ($resultados as $resultado) {
        echo $resultado->codigo . ' - ' . $resultado->descricao . ' - ' . $resultado->nome . "\n";
        echo '- Total de Membros da Equipe do Projeto: ' . $resultado->membroEquipeProj . "\n";
        echo '- Total de Dias de Atraso do Projeto: ' . ($resultado->diasProjetoAtrasado ?? 0) . "\n";
        echo '- Total de Atividades do Projeto: ' . $resultado->atvProjeto . "\n";
        echo '- Total de Atividades Atrasadas do Projeto: ' . ($resultado->atvAtrasadasProjeto ?? 0) . "\n";
        echo '- Total de Dias de Atividades Atrasadas: ' . ($resultado->diasAtvAtrasadas ?? 0) . "\n\n";
    }*/

    echo "A consulta demorou " . $consulta['tempo'];
}

function deletarIndices()
{
    $capsule = require 'app/config/connection.php';
    
    $capsule::connection()->getPdo()->exec("ALTER TABLE funcionario DROP INDEX IF EXISTS idx_funcionario_nome;");
    $capsule::connection()->getPdo()->exec("ALTER TABLE equipe DROP INDEX IF EXISTS idx_equipe_codigo;");
    $capsule::connection()->getPdo()->exec("ALTER TABLE atividade_projeto DROP INDEX IF EXISTS idx_atividade_codProjeto;");
    $capsule::connection()->getPdo()->exec("ALTER TABLE atividade DROP INDEX IF EXISTS idx_situacao_dataFim;");
}
