#!/usr/bin/env php

<?php

require '../vendor/autoload.php';

use ExoUNX\Entropic;

$genpass = new Entropic\Entropic();


echo $genpass->genPassword(20);


