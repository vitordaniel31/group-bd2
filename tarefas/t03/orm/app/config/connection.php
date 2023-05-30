<?php

require 'vendor/autoload.php';
require_once 'helpers/functions.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$connection = require 'config.php';
$capsule->addConnection($connection['database']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

return $capsule;