<?php

define('ROOT_DIR', __DIR__ . '/');

require_once ROOT_DIR . 'vendor/autoload.php';
require_once ROOT_DIR . 'src/BladerRoute.php';
require_once ROOT_DIR . 'src/Blader.php';

use xy2z\Blader\Blader;

$blader = new Blader;
