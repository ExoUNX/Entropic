#!/usr/bin/env php

<?php

require __DIR__ . '/../vendor/autoload.php';

use ExoUNX\Entropic;

$genpass = new Entropic\Entropic();

try {
    echo $genpass->genPassword(20) . hex2bin('0d0a');
} catch (\Exception $e) {
    echo $e->getMessage();
}


