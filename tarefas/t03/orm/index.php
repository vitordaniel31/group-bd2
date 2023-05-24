<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Atividade;

$capsule = new Capsule;

$connection = require 'config.php';
$capsule->addConnection($connection['database']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$atividades = Atividade::all();

foreach ($atividades as $atividade) {
    echo $atividade->descricao . '<br>';
}