<?php

require 'vendor/autoload.php';

$capsule = require 'app/config/connection.php';

$capsule::connection()->getPdo()->exec('CREATE INDEX idx_funcionario_nome ON funcionario (nome)');
$capsule::connection()->getPdo()->exec('CREATE INDEX idx_equipe_codigo ON equipe (codigo)');
$capsule::connection()->getPdo()->exec('CREATE INDEX idx_projeto_equipe ON projeto (equipe)');
$capsule::connection()->getPdo()->exec('CREATE INDEX idx_atividade_codAtividade ON atividade_projeto (codAtividade)');
$capsule::connection()->getPdo()->exec('CREATE INDEX idx_atividade_codProjeto ON atividade_projeto (codProjeto)');
$capsule::connection()->getPdo()->exec('CREATE INDEX idx_situacao_dataFim ON atividade (situacao, dataFim)');
