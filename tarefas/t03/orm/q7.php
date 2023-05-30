<?php

require 'vendor/autoload.php';

$capsule = require 'app/config/connection.php';

$capsule::connection()->getPdo()->exec('ALTER TABLE projeto ADD INDEX idx_codigo (codigo)');



