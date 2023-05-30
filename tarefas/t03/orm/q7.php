<?php

function questao7()
{
    $capsule = require 'app/config/connection.php';
    
    $capsule::connection()->getPdo()->exec('CREATE INDEX IF NOT EXISTS idx_atividade_situacao ON atividade (situacao)');
}

